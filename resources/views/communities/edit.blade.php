@extends('layouts.app')
@section('content')
       <body>
          <div class="container">
            <h1 class="my-5 posts-title">コミュニティ編集</h1>
            <form action="/communities/{{ $community->id }}" method="POST">
              @csrf
              @method('PUT')
              <h2>コミュニティを編集しよう</h2>
                  <div class="name common-input">
                      <!-- name 属性のところはリクエストの配列のキーの部分にあたる。-->
                      <input id="community_name" type="text" name="community[name]"value="{{ $community->name }}">
                      <label for="community_name">名前</label>
                      <p class="title__error" style="color:red">{{ $errors->first('community.name') }}</p>
                  </div>
                  <div class="target common-input">
                      <textarea id="community_target" name="community[target]">{{ $community->target }}</textarea>
                      <label for="community_target">目標</label>
                      <p class="body__error" style="color:red">{{ $errors->first('community.target') }}</p>
                  </div>
                  <input type="submit" value="投稿" class="common-submit">
            </form>
            <div class="footer">
              <a href="/communities/personal">戻る</a>
            </div>
          </div>
@endsection