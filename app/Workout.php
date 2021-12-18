<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function getByWorkout(int $limit_count = 10)
    {
         return $this->posts()->with('workout')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
    'name',
    'category_id'
    ];
}
