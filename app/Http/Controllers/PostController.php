<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostController extends Controller
{
    public function index(){
        $postsFromDB = Post::all();
        return view('posts.index',['postsFromDB' => $postsFromDB]);
    }
    public function show(Post $post, User $user){
        // $singlePost = Post::findOrFail($post);
        $users = User::all();
        return view('posts.show',['post' => $post,'users' => $users]);
    }
    public function create(){      
        $users = User::all();
        return view('posts.create',['users' => $users]);
    }
    public function store(Request $request){
        // $data = request() -> all();
        // $title = request() -> title;
        // $description = request() -> description;
        $title = $request -> title;
        $description = $request -> description;
        $user_id = $request -> user_id;
        $post = POST::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $user_id
        ]);
        // $post = new POST;
        // $post -> title = $title;
        // $post -> description = $description;
        // $post -> save();
        return redirect() -> route('posts.index');
        // return redirect(route('posts.index'));
    }
    public function edit(Post $post, User $user){
        // $singlePost = Post::findOrFail($post);
        $users = User::all();
        return view('posts.edit',['post' => $post,'users' => $users]);
    }
    public function update($post, Request $request){
        $singlePost = Post::findOrFail($post);
        $singlePost -> update([
            'title' => $request -> title,
            'description' => $request -> description,
            'user_id' => $request -> user_id
        ]);
        return redirect() -> route('posts.index');
    }
    public function destroy($post){
        // $singlePost = POST::findOrFail($post);
        // $singlePost -> delete();
        POST::where('id',$post) -> delete();
        return redirect() -> route('posts.index');
    }
}
