@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="posts-title">自分の所属コミュニティ</h1>
    <div class="community-btn-wrapper">
        <div class="community-btn">
          <a href="/communities/create">新しいコミュニティを作る</a>
        </div>
        <div class="community-btn">
          <a href="/communities">コミュニティ一覧画面</a>
        </div>
    </div>
    <div class="row">
    @foreach ($communities as $community )
    @if($community->users()->where('user_id', Auth::id())->exists())
      <div class="col-lg-4">
        <div class="card community-card">
         <a href ="/communities/{{ $community->id }}/group" class="community-clickable">
          <div class="card-body">
            <h5 class="card-title community-title">{{ $community->name }}</h5>
            <p class="card-text">{{ $community->target }}</p>
            <p class="card-text">現在のメンバー：@foreach($community->users as $user) {{$user->name}} @endforeach</p>
            <div class="community-card-btn-wrapper">
                <div class="">
                    <form action="{{ route('unjoin', $community) }}" method="POST">
                        @csrf
                        <input type="submit" value="コミュニティを抜ける" class="btn btn-secondary" onclick='return confirm("本当にこのコミュニティを抜けますか？");'>
                    </form>
                 </div>
                 <div class="">
                    <form action="/communities/{{ $community->id }}" id="form_delete" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除する" class="btn btn-danger" onclick='return confirm("一度削除すると元に戻せません。メンバーとよく話し合ってから決めてください。本当に削除しますか？");'>
                    </form>
                </div>
            </div>
          </div>
         </a>
        </div>
      </div>
      @endif
    @endforeach
    </div>
    <div class="paginate">
    </div>
</div>
@endsection