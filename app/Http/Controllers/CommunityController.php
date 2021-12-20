<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
use App\Workout;
use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index(Community $community)
    {
        //return view('index')は、viewsのindex.blade.phpを表示する
        //with(['posts' => $post]);で、blade.phpでpostsが使えるようになる
        return view('communities.index')->with(['communities' => $community->getPaginateByLimit()]);
    }
}
