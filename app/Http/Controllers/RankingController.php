<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
use App\Workout;
use App\Post;
use App\Category;
use App\Ranking;
use App\Http\Requests\CommunityRequest;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    public function index(Workout $workout, Category $category)
    {
        return view('rankings.index')->with(['workouts' => $workout,'categories' => $category->get()]);
    }
    
    public function show(Request $request, Workout $workout,Post $post)
    {   
        // dd($request->month);
        $year_month = $request->year_month;
        $workouts = $workout->posts2($year_month);
        // $workouts = $workout->posts;
        
        $workout_unique = $workouts->sort(function ($first, $second){
        if ($first['weight'] == $second['weight']) {
            return $first['rep'] < $second['rep'] ? 1 : -1 ;
        }
        return $first['weight'] < $second['weight'] ? 1 : -1 ;
        })->unique('user_id');
        
        $name = [];
        $weight = [];
        $rep = [];
        foreach ($workout_unique as $workoutrank) {
            $name[] = $workoutrank->user->name;
            $weight[] = $workoutrank->weight;
            $rep[] = $workoutrank->rep;
        }
        
        $message="今月のランキング！
        ベンチプレス→
        １位 ".$name[0]." ".$weight[0]."kg ".$rep[0]."回".PHP_EOL.
        "2位 ".$name[1]." ".$weight[1]."kg ".$rep[1]."回".PHP_EOL.
        "3位 ".$name[2]." ".$weight[2]."kg ".$rep[2]."回".PHP_EOL.
        "4位 ".$name[3]." ".$weight[3]."kg ".$rep[3]."回".PHP_EOL.
        "5位 ".$name[4]." ".$weight[4]."kg ".$rep[4]."回".PHP_EOL.
        
        "スクワット→".
        "その他ランキングは以下からチェック！
        https://blooming-brook-25294.herokuapp.com/rankings";
        
        return view('rankings.show')->with([
            'workout' => $workout,
            'posts' => $post->get(),
            'workout_unique' => $workout_unique,
            'year_month' => $year_month,
            'message' => $message,
            
            ]);
    }
}
