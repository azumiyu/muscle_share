<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
use App\Workout;
use App\Post;
use App\Category;
use App\Http\Requests\CommunityRequest;
use Illuminate\Http\Request;
use Auth;

class CommunityController extends Controller
{
    public function index(Community $community, User $user)
    {
        //return view('index')は、viewsのindex.blade.phpを表示する
        //with(['posts' => $post]);で、blade.phpでpostsが使えるようになる
        return view('communities.index')->with([
            'communities' => $community->getPaginateByLimit(),
            'user' => $user->get()
            ]);
    }
    
    public function create()
    {
        return view('communities.create');
    }
    
     public function store(CommunityRequest $request, Community $community)
    {
        $input = $request['community'];
        $community->fill($input)->save();
        return redirect('/communities');
    }
    
    public function show(User $user, Community $community)
    {
        // dd($user->communities()->get());
        // $community = Community::where('user_id', $user->id)->get();
        return view('communities.show')->with([
            'communities' => $community->getPaginateByLimit(),
            'users' => $user->get()
            ]);
    }
    
    public function showGroup($id, Post $post)
    {
        $community = Community::find($id);
        
        foreach($community->users as $user) {
        if($user->id == Auth::id()) {
            
        return view('communities.showGroup')->with([
            'community' => $community,
            'posts' => $post->getPaginateByLimit(),
            ]);
        // }
        } 
    }
    return redirect('/communities')->with('flash_message', 'このコミュニティには参加していません。');
    }
    
    public function delete(Community $community)
    {
        $community->delete();
        return back();
    }
}
