<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Family;


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }

    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id]; 
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];  
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
    public function family(Post $post, User $user)
    {
         $user = Auth::user();
       
        if($user->family_id!=null){
            $users = User::where('family_id', $user->family_id)->get();
        $postsByUsers = [];

        foreach ($users as $user) {
            $posts = Post::where('user_id', $user->id)->get();
            $postsByUsers[$user->id] = $posts;
        }
             return view('posts/index')->with(['postsByUsers' => $postsByUsers]);
        }else{
             return view('family');
        }
    }

    public function family_create()
    {
        return view('family_create');
    }
    
    public function family_register(Request $request, Family $family)
    {
        $input_family = $request['family'];
        $family->fill($input_family)->save();
        return redirect('/family');
    }

}
