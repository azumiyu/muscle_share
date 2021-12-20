<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getPaginateByLimit(int $limit_count = 10)
    {

        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
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
    
     protected $fillable = [
    'weight',
    'rep',
    'set',
    'comment',
    'workout_id',
    'user_id'
    ];
}
