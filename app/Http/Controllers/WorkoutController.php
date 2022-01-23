<?php

namespace App\Http\Controllers;


use App\Http\Requests\WorkoutRequest;
use App\Http\Requests\CategoryRequest;
use App\Workout;
use App\Category;

class WorkoutController extends Controller
{
    public function index(Workout $workout)
    {
        return view('workouts.index')->with(['posts' => $workout->getByWorkout()]);
    }
    
    public function work_store(WorkoutRequest $request, Workout $workout)
    {
        $input = $request['workout'];
        $workout->fill($input)->save();
        return redirect('/posts/create')->with('flash_message', '種目を追加しました！');
    }
    
    public function category_store(CategoryRequest $request, Category $category)
    {
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/posts/create')->with('flash_message', '部位を追加しました！');
    }
}
