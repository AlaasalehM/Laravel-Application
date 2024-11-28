<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use PHPUnit\Event\Code\Test;
use App\Models\Post;
use App\Models\user;

class postcontroller extends Controller
{
    public function index()
    {
        $postsfromDB = Post::all();

        return view('posts.index',['posts' => $postsfromDB]);

    }
    public function show(Post $post)
    {
        return view('posts.show',['post' => $post]);
    }
    public function create(){
        $users = user::all();
        return view('posts.create',['users'=>$users]);
    }
    public function store(){

        request()->validate([
            'title' => 'required|string|min:3',
            'description' => 'required|string',
            'post_creator'=>['required','exists:users,id']
        ]);
        $data=request()->all();
        $title = request()->title;
        $description =request()->description;
        $user=request()->post_creator;
        Post::create([
            'title' => $title,
            'description'=> $description,
            'user_id'=>$user,
        ]);

        return to_route(route:('posts.index'));
    }
    public function edit(Post $post){
        $users = user::all();
        return view('posts.edit',['users' => $users,'post' => $post]);
    }

    public function update($postId){
        request()->validate([
            'title' => 'required|string|min:3',
            'description' => 'required|string',
            'post_creator'=>['required','exists:users,id']
        ]);

        $title = request()->title;
        $description =request()->description;
        $user=request()->post_creator;

        $post = Post::find($postId);
        $post->update([
            'title'=> $title,
            'description'=> $description,
            'user_id'=>$user,
        ]);
        return to_route('posts.show', $postId);
    }

    public function destroy($postId){
        $post= post::find($postId);
        $post->delete();
        return to_route('posts.index');
    }
}
  // $singlePostFromDB = post::findOrFail($postId);
        // $singlePostFromDB->update([
        //     'title' =>$title,
        //     'description'=>$description,
        // ]);
