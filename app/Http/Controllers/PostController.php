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
        $benchRanking = $post->benchData()->sort(function ($first, $second){
        if ($first['weight'] == $second['weight']) {
            return $first['rep'] < $second['rep'] ? 1 : -1 ;
        }
        return $first['weight'] < $second['weight'] ? 1 : -1 ;
        })->unique('user_id')->take(5);
        
        $squatRanking = $post->squatData()->sort(function ($first, $second){
        if ($first['weight'] == $second['weight']) {
            return $first['rep'] < $second['rep'] ? 1 : -1 ;
        }
        return $first['weight'] < $second['weight'] ? 1 : -1 ;
        })->unique('user_id')->take(5);
        
        $name1 = [];
        $weight1 = [];
        $rep1 = [];
        foreach ($benchRanking as $workoutrank) {
            $name1[] = $workoutrank->user->name;
            $weight1[] = $workoutrank->weight;
            $rep1[] = $workoutrank->rep;
        }
        
        $name2 = [];
        $weight2 = [];
        $rep2 = [];
        foreach ($squatRanking as $workoutrank) {
            $name2[] = $workoutrank->user->name;
            $weight2[] = $workoutrank->weight;
            $rep2[] = $workoutrank->rep;
        }
        
        for($i=0; $i< count($name1);$i++){
            $rank = $i + 1;
            $bench = $rank."位 ".$name1[$i]." ".$weight1[$i]."kg ".$rep1[$i]."回".PHP_EOL;
        }
        
        for($i=0; $i< count($name2);$i++){
            $rank = $i + 1;
            $squat = $rank."位 ".$name2[$i]." ".$weight2[$i]."kg ".$rep2[$i]."回".PHP_EOL;
        }
        
        $message="今月のランキング！
        ベンチプレス→".PHP_EOL.
        $bench.
        "スクワット→".PHP_EOL.
        $squat.
        "その他ランキングは以下からチェック！
        https://blooming-brook-25294.herokuapp.com/rankings";
        
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);  
    }
    
    public function create(Workout $workout, User $user, Category $category)
    {
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
