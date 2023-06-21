<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index(){}

    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required | min:3 | max:250'
        ]);

        Reply::create([
            'post_id'=>$request->post_id,
            'text'=> $request->description
        ]);
        $post=Post::find($request->post_id);
        return view('dashboard.post.show', ['post'=>$post]); 
    }

    public function show(Reply $reply){}


    public function edit(Reply $reply){}

    public function update(Request $request, Reply $reply)
    {
        $request->validate([
            'description'=>'required | min:3 | max:1000'
        ]);
        $reply->text=$request->description;
        $reply->save();
        $post=Post::find($reply->post_id);
        return view('dashboard.post.show', ['post'=>$post]);
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();
        $post=Post::find($reply->post_id);
        return view('dashboard.post.show', ['post'=>$post]); 
    }
}
