<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getPaginateByLimit2(int $limit_count = 10)
    {
        return $this->orderBy('weight', 'DESC')->paginate($limit_count);
    }

    public function workout()
    {
        return $this->belongsTo('App\Workout');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    
    public function benchData()
    {
        return $this->with('workout')->whereMonth('created_at', '=', date('m'))->where('workout_id', 1)->get();
    }
    
    public function squatData()
    {
        return $this->with('workout')->whereMonth('created_at', '=', date('m'))->where('workout_id', 2)->get();
    }
    
    use SoftDeletes;
    
     protected $fillable = [
    'weight',
    'rep',
    'set',
    'comment',
    'workout_id',
    'user_id'
    ];
}
