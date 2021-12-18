@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($posts as $post)
        <h1 class="posts-title">{{ $post->user->name}}さんの投稿</h1>
        @break
        @endforeach
        <div class="posts">
           @foreach ($posts as $post)
            <div class="card mb-3 posts_card">
                <div class="card-body">
                    <div class="posts-top">
                      種目: <a href="/workouts/{{ $post->workout->id }}" class="text-success">{{ $post->workout->name }}</a>
                      {{ $post->weight }}キロ　{{ $post->rep }}回　{{ $post->set }}@if($post->set != NULL){{"セット"}}@endif　{{ $post->created_at }}
                    </div>
                    <p class="card-text">コメント：{{ $post->comment }}</p>
                </div>
            </div>
           @endforeach
       </div>
       <a href="/posts/create" class="posts_btn">投稿</a>
       <div class="paginate">
           {{ $posts->links() }}
       </div>
    </div>
@endsection