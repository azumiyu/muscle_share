@extends('layouts.app')
@section('content')
       <body>
          <div class="container">
            <h1 class="posts-title">みんなの筋トレ掲示板</h1>
                @foreach ($posts as $post)
                <div class="card mb-3 posts_card">
                  <div class="card-body">
                    <div class="posts-top posts-item">
                      種目: <a href="/workouts/{{ $post->workout->id }}" class="text-success">{{ $post->workout->name }}</a>
                      投稿者: <a href="/users/{{ $post->user->id}}" class="text-success">{{ $post->user->name }}</a>
                    </div>
                    <p class="card-text">{{ $post->weight }}@if($post->weight != NULL){{"kg"}}@endif　{{ $post->rep }}回　{{ $post->set }}@if($post->set != NULL){{"セット"}} @endif{{ $post->created_at->format('Y年m月d日') }}</p><hr>
                    <p class="card-text">コメント：{{ $post->comment }}</p>
                    <div class="favorite-btn">
                      @if($post->users()->where('user_id', Auth::id())->exists())
                      <div class="col-md-3">
                        <form action="{{ route('unfavorites', $post) }}" method="POST">
                           @csrf
                           <input type="submit" value="いいね" class="btn btn-success">
                        </form>
                       </div>
                      @else
                      <div class="col-md-3 ">
                        <form action="{{ route('favorites', $post) }}" method="POST">
                          @csrf
                          <input type="submit" value="いいね" class="btn btn-secondary">
                        </form>
                       </div>
                      @endif
                      <p>いいね数：{{ $post->users()->count() }}</p>
                    </div>
                  </div>
                </div>
              @endforeach
              <a href="/posts/create" class="posts_btn">投稿</a>
              <div class="paginate">
                   {{ $posts->links() }}
              </div>
          </div>
@endsection