<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
    
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
    
    public function personals()   
    {
        return $this->hasMany('App\Personal');  
    }
    
    public function personals2($year_month)   
    {
        return $this->personals()->with('user')->where('personals.date_key','like',"%$year_month%")->get();
        
    }
    
    public function favorites()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    
    public function join()
    {
        return $this->belongsToMany('App\Community')->withTimestamps();
    }
    
    public function getByUser(int $limit_count = 10)
    {
         return $this->posts()->with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function communities()
    {
        return $this->belongsToMany('App\Community')->withTimestamps();
    }
    
    public function rankings()   
    {
        return $this->hasMany('App\Post');  
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * IDから一件のデータを取得する
     */
    public function selectUserFindById($id)
    {
        // 「SELECT id, name, email WHERE id = ?」を発行する
        $query = $this->select([
            'id',
            'name',
            'email'
        ])->where([
            'id' => $id
        ]);
        // first()は1件のみ取得する関数
        return $query->first();
    }
}