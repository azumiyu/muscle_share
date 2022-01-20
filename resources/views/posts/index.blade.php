@extends('layouts.app')
@section('content')
          <div class="container">
            <h1 class="posts-title">みんなの筋トレ掲示板</h1>
                @foreach ($posts as $post)
                <div class="card mb-3 posts_card">
                  <div class="card-body posts-item">
                    <div class="posts-top">
                      種目: <a href="/workouts/{{ $post->workout->id }}" class="text-success">{{ $post->workout->name }}</a><br class="br-sp">
                      投稿者: <a href="/users/{{ $post->user->id}}" class="text-success">{{ $post->user->name }}</a>
                    </div>
                    <p class="card-text">{{ $post->weight }}@if($post->weight != NULL){{"kg"}}@endif　{{ $post->rep }}回　{{ $post->set }}@if($post->set != NULL){{"セット"}} @endif</p><hr>
                    <p class="card-text posts-index-comment">コメント：{{ $post->comment }}</p>
                    <p class="text-right text-secondary">{{ $post->created_at->format('Y年m月d日') }}</p>
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
                        <form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                        </form>
                      </div>
                      @endif
                  </div>
                </div>
              @endforeach
              <a href="/posts/create" class="posts_btn">投稿</a>
              <div class="paginate">
                   {{ $posts->links() }}
              </div>
          </div>
@endsection