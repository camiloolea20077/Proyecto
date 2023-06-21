<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PostController extends Controller{
    use ApiResponse;

    public function index(){
        $posts=Post::join('categories', 'categories.id', '=', 'posts.category_id')->
        orderBy('posts.created_at', 'desc')->paginate(10);
        return $this->successResponse($posts);
    }

    public function show(Post $post){
        $post->image;
        $post->category;
        return $this->successResponse($post);
     }
 
     public function category(Category $category){
        return $this->successResponse(["posts"=>$category->post()->paginate(10), 'category'=>$category]);
     }  
     
    public function url_clean(String $url_clean){
        $post= Post::where('url_clean', $url_clean)->get();
        $post->category;
        return $this->successResponse($post);
    }

}
