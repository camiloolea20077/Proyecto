<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller{

    public function __construct() {
        $this->middleware(['auth']);
        $this->middleware(['permission:ver-publicaciones'])->only('index');
        $this->middleware(['permission:crear-publicaciones'])->only('create', 'store');
        $this->middleware(['permission:editar-publicaciones'])->only('edit', 'update');
        $this->middleware(['permission:eliminar-publicaciones'])->only('destroy');
    }

    public function index() {
        $posts = Post::all();
        return view('dashboard.post.index', ['posts'=>$posts]);
    }

    public function create(){
        $categorias= Category::all();
        return view('dashboard.post.create', ['post'=>new Post(), 'categories'=>$categorias, 'ifCategorySelected'=>false]);
    }

    public function store(StorePost $request){
        if($request->category_id=='Elija una opcion'){
            return back()->with('status', 'Elije una opción en las categorias!');
        }
        Post::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id
        ]);
        $posts= Post::all();
        return view('dashboard.post.index', ['posts'=>$posts]);
    }

    public function show(Post $post){
        return view('dashboard.post.show', ['post'=>$post]); 
    }

    public function edit(Post $post) {
        $categorias= Category::all();
        return view('dashboard.post.edit', ['post'=>$post, 'categories'=>$categorias, 'ifCategorySelected'=>true]);  
    }

    public function update(StorePost $request, Post $post){
        $post->name=$request->name;
        $post->category_id=$request->category_id;
        $post->description=$request->description; 
        $post->save($request->validated());
        $posts= Post::all();
        return view('dashboard.post.index', ['posts'=>$posts]);
    }

    public function destroy(Post $post){
        if($post->user->id==Auth()->user()->id){
            $post->delete();
            return back()->with('status', 'Publicación eliminada!');
        }else{
            return back()->with('status', 'Solo el autor puede eliminar esta publicación!');
        }
    }

}
