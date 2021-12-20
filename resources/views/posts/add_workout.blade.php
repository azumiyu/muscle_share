@extends('layouts.app')
@section('content')
       <body>
          <div class="container">
            <h1 class="my-5 posts-title">種目追加</h1>
            <form action="/add_workout" method="POST">
              @csrf
              <h2>新しい種目を追加しよう</h2>
              <select id="category" name="workout[category_id]" class="common-select category-select">
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                <option selected disabled>部位を選択</option>
              @endforeach
              </select>
              <div class="common-input">
                <input id="add-workout" type="text" name="workout[name]">
                <label for="add-workout">種目追加</label>
                <p class="title__error" style="color:red">{{ $errors->first('workout.name') }}</p>
              </div>
              <input type="submit" value="追加" class="common-submit">
            </form>
            <div class="footer">
              <a href="/posts/create">戻る</a>
            </div>
          </div>
@endsection