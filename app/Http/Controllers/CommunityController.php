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
            'user' => $user->getByuser()
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
    
    public function show(User $user)
    {
        // dd($user->communities()->get());
        // $community = Community::where('user_id', $user->id)->get();
        $community_paginate = $user->communities()->paginate(9);
        if(Auth::id() == $user->id){
        return view('communities.show')->with([
            'user' => $user,
            'community_paginate' => $community_paginate
            ]);
        }
        return redirect('/communities')->with('flash_message','自分以外の人の所属コミュニティは見れません。');
    }
    
    public function showGroup(Community $community, Post $post, User $user)
    {
        $community_user_ids = [];
        foreach($community->users as $user) {
            $community_user_ids[] = $user->id;
        }
        $post = Post::orderBy("created_at",'desc')->whereIn('user_id', $community_user_ids)->paginate(10);
        foreach($community->users as $user) {
        if($user->id == Auth::id()) {
        return view('communities.showGroup')->with([
            'community' => $community,
            'posts' => $post,
            ]);
        } 
    }
    return redirect('/communities')->with('flash_message', 'このコミュニティには参加していません。');
    }
    
    public function edit(Community $community)
    {
        foreach($community->users as $user) {
            if($user->id == Auth::id()) {
            return view('communities.edit')->with(['community' => $community]);
            }
        }
        return redirect('/communities')->with('flash_message', '所属していないコミュニティの編集はできません。');
    }
    
    public function update(CommunityRequest $request, Community $community)
    {
        $input = $request['community'];
        $community->fill($input)->save();
        return redirect('/communities/personal/' . Auth::id());
    }
    
    public function delete(Community $community)
    {
        $community->delete();
        return back();
    }
}
