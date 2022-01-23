@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="posts-title">コミュニティ</h1>
    @if (Session::has('flash_message'))
        <div class="alert alert-danger" role="alert">
            {{ session('flash_message') }}
        </div>
    @endif
    
    @if (Session::has('flash_message-success'))
        <div class="alert alert-success" role="alert">
            {{ session('flash_message-success') }}
        </div>
    @endif
    <div class="community-btn-wrapper">
        <div class="community-btn">
          <a href="/communities/create">新しいコミュニティを作る</a>
        </div>
        <div class="community-btn">
          <a href="/communities/personal/{{ Auth::id() }}">自分の所属コミュニティ</a>
        </div>
    </div>
    <div class="row">
    @foreach ($communities as $community)
      <div class="col-lg-4">
        <div class="card community-card">
        @if($community->users()->where('user_id', Auth::id())->exists())
        <a href ="/communities/{{ $community->id }}/group" class="community-clickable">
        @endif
          <div class="card-body">
            <h5 class="card-title community-title">{{ $community->name }}</h5>
            <p class="card-text">{{ $community->target }}</p>
            @if($community->users()->where('user_id', Auth::id())->exists())
                <div class="col-md-3">
                    <form action="{{ route('unjoin', $community) }}" method="POST">
                        @csrf
                        <input type="submit" value="コミュニティを抜ける" class="btn btn-secondary" onclick='return confirm("本当にこのコミュニティを抜けますか？");'>
                    </form>
                </div>
            @elseif(count($community->users) >= 5)
            <input type="submit" disabled value="満員です" class="btn btn-secondary">
            @else
                <div class="col-md-3 ">
                    <form action="{{ route('join', $community) }}" method="POST">
                        @csrf
                        <input type="submit" value="コミュニティに参加する" class="btn btn-success" onclick='return confirm("このコミュニティに参加しますか？");'>
                    </form>
                </div>
            @endif
            <p class="card-text">現在の人数：{{ count($community->users) }}/5</p>
            <p class="card-text">{{ $community->created_at->format('Y年m月d日') }}に作成</p>
          </div>
          @if($community->users()->where('user_id', Auth::id())->exists())
          </a>
          @endif
        </div>
      </div>
    @endforeach
    </div>
    <div class="paginate mt-4">
        {{ $communities->links() }}
    </div>
</div>
@endsection