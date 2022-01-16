<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = "personals";
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
     protected $fillable = [
    'weight',
    'user_id',
    'date_key'
    ];
}
