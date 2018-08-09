<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users
        ]);
    }
    public function store(StorePostRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'user_id' => $request->user_id
        ]);
        
       return redirect(route('posts.index')); 
    }

    public function index()
    {
       $posts = Post::all();
       return view('posts.index',[

            'posts' => $posts
        ]);
    }
        
   
    public function show(Post $post){
        return view('posts.show',compact('post'));
    }

   

    public function destroy(Post $post)
    {
       $post->delete();
       return redirect(route('posts.index'));
    }
    public function edit ($id)
    {
     $post=Post::find($id);
     $users=User::all();
     return view('posts.edit',compact('post','users'));
    }
    public function update(UpdatePostRequest $request,$id){
        $post=Post::find($id);
        $post->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'user_id' => $request->user_id
        ]);
       return redirect(route('posts.index')); 
    }
  
}
