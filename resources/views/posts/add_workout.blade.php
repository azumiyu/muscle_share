@extends('layouts.app')
@section('content')
       <body>
          <div class="container">
            <h1 class="my-5 posts-title">種目追加</h1>
            <form action="/posts" method="POST">
              @csrf
              <h2>新しい種目を追加しよう</h2>
              <label for="category">部位を選んでね</label>
              <select id="category" name="workout[category_id]">
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
              </select>
            <label for="add-workout">種目追加</label>
            <input id="add-workout" type="text" name="workout[name]" placeholder="例 ショルダープレス"/>
            <input type="submit" value="追加"/>
            </form>
            <div class="footer">
              <a href="/posts">戻る</a>
            </div>
          </div>
@endsection