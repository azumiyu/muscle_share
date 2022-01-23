@extends('layouts.app')
@section('content')
       <body>
          <div class="container">
            <h1 class="my-5 posts-title">コミュニティ作成</h1>
            <form action="/communities" method="POST">
              @csrf
              <h2>新たなコミュニティを作ろう</h2>
                  <div class="name common-input">
                      <!-- name 属性のところはリクエストの配列のキーの部分にあたる。-->
                      <input id="community_name" type="text" name="community[name]" placeholder="肩メロンを目指すコミュニティ" value="{{ old('community.name') }}">
                      <label for="community_name">名前</label>
                      <p class="title__error" style="color:red">{{ $errors->first('community.name') }}</p>
                  </div>
                  <div class="target common-input">
                      <textarea id="community_target" name="community[target]" placeholder="例：肩をパンプアップしまくりましょう。やる気がある人は大歓迎です！（最大200文字）" class="limit-textarea">{{ old('community.comment') }}</textarea>
                      <label for="community_target">目標</label>
                      <p id="count">あと<span id="num"></span>文字</p>
                      <p class="body__error" style="color:red">{{ $errors->first('community.target') }}</p>
                  </div>
                  <input type="submit" value="投稿" class="common-submit">
            </form>
            <div class="footer">
              <a href="" onclick="history.back(-1);return false;" class="btn btn-primary mt-2">戻る</a>
            </div>
          </div>
@endsection