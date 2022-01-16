<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $table = 'workouts';
    
    public function posts()   
    {
        return $this->hasMany('App\Post'); 
    }
    
    public function posts2($year_month)   
    {
        return $this->posts()->with('workout')->where('posts.created_at','like',"%$year_month%")->get();
        
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function getByWorkout(int $limit_count = 10)
    {
         return $this->posts()->with('workout')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getPaginateByPosts()
    {
        return $this::with('posts')->orderBy('posts.weight','desc')->orderBy('posts.rep','desc')->paginate(1);
    }
    
    protected $fillable = [
    'name',
    'category_id'
    ];
}
