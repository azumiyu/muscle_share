<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;

class WorkoutController extends Controller
{
    public function index(Workout $workout)
    {
        return view('workouts.index')->with(['posts' => $workout->getByWorkout()]);
    }
}
