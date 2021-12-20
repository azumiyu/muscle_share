@extends('layouts.app')
@section('content')
       <body>
          <div class="container">
            <h1 class="my-5 posts-title">今日の筋トレ報告！</h1>
            <form action="/posts" method="POST">
              @csrf
              <h2>筋トレ記録投稿</h2>
                <select id="workouts-name" name="post[workout_id]" class="common-select" aria-label="Default select example">
                  @foreach($categories as $category)
                  @if ((count($category->workouts)) != 0)
                    <optgroup label="{{ $category->name }}">
                      @foreach($category->workouts as $workout)
                      <option selected disabled>種目を選択してね</option>
                      <option value="{{ $workout->id }}">
                        {{$workout->name}}
                      </option>
                      @endforeach
                      @endif
                    </optgroup>
                  @endforeach
                </select>
                <a href="/posts/add_workout" class="add-btn">種目を追加する</a>
                <p class="title__error" style="color:red">{{ $errors->first('post.workout_id') }}</p>
                  <div class="weight common-input">
                      <!-- name 属性のところはリクエストの配列のキーの部分にあたる。-->
                      <input id="weight" type="number" name="post[weight]" value="{{ old('post.weight') }}"/>
                      <label for="weight">キロ数</label>
                      <p class="title__error" style="color:red">{{ $errors->first('post.weight') }}</p>
                  </div>
                  <div class="rep common-input">
                      <input id="rep" type="number" name="post[rep]" value="{{ old('post.rep') }}"/>
                      <label for="rep">回数</label>
                      <p class="body__error" style="color:red">{{ $errors->first('post.rep') }}</p>
                  </div>
                  <div class="set common-input">
                      <input id="set" type="number" name="post[set]" value="{{ old('post.set') }}"/>
                      <label for="set">セット数</label>
                      <p class="body__error" style="color:red">{{ $errors->first('post.set') }}</p>
                  </div>
                  <div class="user">
                      <input type="hidden" name="post[user_id]" value="{{ Auth::user()->id }}"/>
                  </div>
                  <div class="comment common-input">
                      <textarea id="comment" name="post[comment]" placeholder="例：追い込みすぎた笑">{{ old('post.comment') }}</textarea>
                      <label for="comment">コメント</label>
                      <p class="body__error" style="color:red">{{ $errors->first('post.comment') }}</p>
                  </div>
                  <input type="submit" value="投稿" class="common-submit">
            </form>
            <div class="footer">
              <a href="/posts">戻る</a>
            </div>
          </div>
@endsection