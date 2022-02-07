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
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);  
    }
    
    public function create(Workout $workout, User $user, Category $category)
    {
         $user = User::orderBy("created_at",'desc');
            // LINEユーザーID指定
        $userIds = $user->pluck("line_id")->toArray();
        return view('posts.create')->with(['workouts' => $workout->get(),'users' => $user->get(),'categories' => $category->get()]);
    }
    
     public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts')->with('flash_message', '投稿しました！');
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return back();
    }
    
}
