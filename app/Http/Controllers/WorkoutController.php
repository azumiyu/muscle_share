<?php

namespace App\Http\Controllers;


use App\Http\Requests\WorkoutRequest;
use App\Workout;

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
        return redirect('/posts/create');
    }
}
