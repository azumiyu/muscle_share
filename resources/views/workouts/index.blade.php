@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($posts as $post)
        <h1 class="posts-title">{{ $post->workout->name}}の投稿</h1>
        @break
        @endforeach
        <div class="posts">
           @foreach ($posts as $post)
            <div class="card mb-3 posts_card">
                <div class="card-body posts-item">
                    <div class="posts-top">
                      投稿者: <a href="/workouts/{{ $post->user->id }}" class="text-success">{{ $post->user->name }}</a>
                      {{ $post->weight }}@if($post->weight != NULL){{"kg"}}@endif　{{ $post->rep }}回　{{ $post->set }}@if($post->set != NULL){{"セット"}}@endif　{{ $post->created_at->format("Y年m月d日") }}
                    </div>
                    <p class="card-text posts-comment">コメント：{{ $post->comment }}</p>
                      @if($post->users()->where('user_id', Auth::id())->exists())
                      <div class="favorite-btn">
                        <form action="{{ route('unfavorites', $post) }}" method="POST">
                           @csrf
                           <input type="submit" value="いいね" class="btn btn-success">
                           <p>いいね数：{{ $post->users()->count() }}</p>
                        </form>
                       </div>
                      @else
                      <div class="favorite-btn">
                        <form action="{{ route('favorites', $post) }}" method="POST">
                          @csrf
                          <input type="submit" value="いいね" class="btn btn-secondary">
                          <p>いいね数：{{ $post->users()->count() }}</p>
                        </form>
                       </div>
                      @endif
                    @if($post->user_id == Auth::id())
                      <div class="posts-delete">
                        <form action="/posts/{{ $post->id }}" id="form_delete" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                        </form>
                      </div>
                      @endif
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