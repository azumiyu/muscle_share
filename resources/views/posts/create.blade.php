@extends('layouts.app')
@section('content')
          <div class="container">
            <h1 class="posts-title">今日の筋トレ報告！</h1>
            <form action="/posts" method="POST">
              @csrf
              <h2>筋トレ記録投稿</h2>
                <select id="workouts-name" name="post[workout_id]" class="common-select" aria-label="Default select example">
                  <option selected disabled>種目を選択してね</option>
                  @foreach($categories as $category)
                  @if ((count($category->workouts)) != 0)
                    <optgroup label="{{ $category->name }}">
                      @foreach($category->workouts as $workout)
                      <option value="{{ $workout->id }}">
                        {{$workout->name}}
                      </option>
                      @endforeach
                      @endif
                    </optgroup>
                  @endforeach
                </select>
              	<a class="js-modal-open common-submit">種目を追加する</a>
              	<p class="title__error" style="color:red">{{ $errors->first('workout.name') }}</p>
                <p class="title__error" style="color:red">{{ $errors->first('post.workout_id') }}</p>
                  <div class="weight common-input">
                      <!-- name 属性のところはリクエストの配列のキーの部分にあたる。-->
                      <input id="weight" type="number" name="post[weight]" value="{{ old('post.weight') }}" placeholder="(3桁以内)"/>
                      <label for="weight">キロ数</label>
                      <p class="title__error" style="color:red">{{ $errors->first('post.weight') }}</p>
                  </div>
                  <div class="rep common-input">
                      <input id="rep" type="number" name="post[rep]" value="{{ old('post.rep') }}"/>
                      <label for="rep" class="required">回数</label>
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
            
            <div class="modal js-modal">
            	    <div class="modal__bg js-modal-close"></div>
            	    <div class="modal__content">
            	        <form action="/add_workout" method="POST">
            	        	@csrf
            	        	<p>追加したい種目を入力してください。</p>
            	        	<select id="category" name="workout[category_id]" class="common-select category-select">
            	        	  <option selected disabled>部位を選択</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                        <label for="add-workout">種目追加</label>
                        <input id="add-workout" type="text" name="workout[name]">
            	        	<input type = "submit" value = "入力">
            	        <div><a class="js-modal-close common-submit" href="">閉じる</a></div>
            	        </form>
            	    </div><!--modal__inner-->
                </div><!--modal-->
            <div class="footer">
            <a href="javascript:history.back()" class="btn btn-primary mt-3">戻る</a>
            </div>
            
          </div>
@endsection