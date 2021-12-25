@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <a href="/posts">
        <div class="card home-sub-title">
          <img src="{{ asset('img/post.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">筋トレシェア掲示板</h5>
            <p class="card-text">みんなの記録を見ることができる！自分の筋トレ履歴の確認にも使えるぞ！</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col">
      <a href="/communities">
        <div class="card home-sub-title">
          <img src="{{ asset('img/community.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">コミュニティ</h5>
            <p class="card-text">同じ目標を持つ人同士でモチベをあげよう！最大５人だからこそ当事者意識を持てる！</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col">
      <a href="/rankings">
        <div class="card home-sub-title">
          <img src="{{ asset('img/ranking.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">ランキング</h5>
            <p class="card-text">種目別にランキングが見れるぞ！友達と競ってモチベをあげよう！</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col">
      <a href="/personals">
        <div class="card home-sub-title">
          <img src="{{ asset('img/personal.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">成長記録</h5>
            <p class="card-text">成長記録が見れる！自分の体重の変化を楽しもう！！昨日の自分を超えろ！</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
<a href="/posts/create" class="posts_btn">投稿</a>
@endsection
