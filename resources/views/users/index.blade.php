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
                      {{ $post->weight }}@if($post->weight != NULL){{"kg"}}@endif　{{ $post->rep }}回　{{ $post->set }}@if($post->set != NULL){{"セット"}}@endif　{{ $post->created_at->format("Y年m月d日") }}
                    </div>
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
       </div>
       <a href="/posts/create" class="posts_btn">投稿</a>
       <div class="paginate">
           {{ $posts->links() }}
       </div>
    </div>
@endsection