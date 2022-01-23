@extends('layouts.app')
@section('content')
<div class="container">
    <div class="rankings">
        <h1 class="posts-title">みんなのランキング</h1>
        <p>ここでは、種目ごとにランキングを見ることができます。</p>
    </div>
    <div class="ranking-category-wrapper">
    @foreach($categories as $category)
        <div class="dropdown">
          <button class="btn btn-success dropdown-toggle ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $category->name }}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach($category->workouts as $workout)
            <a class="dropdown-item" href="/rankings/{{$workout->id}}">{{$workout->name}}</a>
            @endforeach
          </div>
        </div>
    @endforeach
    </div>
</div>
@endsection