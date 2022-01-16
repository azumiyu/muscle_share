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
        
        return view('rankings.show')->with([
            'workout' => $workout,
            'posts' => $post->get(),
            'workout_unique' => $workout_unique,
            'year_month' => $year_month
            
            ]);
    }
    
    public function month(Request $request)
    {
        dd($request->input('year'));
        return view('rankings.month ');
    }
    
}
