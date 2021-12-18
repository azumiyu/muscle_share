<?php

namespace App\Http\Controllers;

use App\User;
use App\Workout;
use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post, Workout $workout)
    {
        //return view('index')は、viewsのindex.blade.phpを表示する
        //with(['post' => $post]);で、blade.phpでpostsが使えるようになる
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()],['workouts' => $workout->get()]);  
    }
    
    public function create(Workout $workout, User $user, Category $category)
    {
        return view('posts.create')->with(['workouts' => $workout->get(),'users' => $user->get(),'categories' => $category->get()]);
    }
    
    public function add_workout(Workout $workout, User $user, Category $category)
    {
        return view('posts.add_workout')->with(['workouts' => $workout->get(),'users' => $user->get(),'categories' => $category->get()]);
    }
    
     public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts');
    }
    
    public function work_store(Request $request, Workout $workout)
    {
        $input = $request['workout'];
        $workout->fill($input)->save();
        return redirect('/posts/create');
    }
}
