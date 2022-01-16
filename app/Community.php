<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = [
    'name',
    'target'
    ];
    
    public function getPaginateByLimit(int $limit_count = 9)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}