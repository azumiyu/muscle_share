@extends('layouts.app')
@section('content')
<div class="container">
    <div class="rankings">
        <h1 class="posts-title">{{ $workout->name }}のランキング </h1>
        <div class="month-ranking text-center">
          <form>
            <label for="month">月ごとのランキング</label>
            <input type="month" name="year_month" min="2000-01" max="2100-12">
            <input type="submit" value="表示" class="common-submit">
          </form>
        </div>
        <h3 class="text-center pt-2">@if($year_month != null){{ $year_month}}月のランキング@endif</h3>
        <table class="table_box pt-3">
          <tr>
            <th>順位</th>
            <th>名前</th>
            <th>ウェイト（kg）</th>
            <th>回数</th>
            <th>投稿日</th>
          </tr>
          @php
          $rank = 1;
          $cnt = 1;
          $weight_point = 0;
          $rep_point = 0;
          @endphp
          
          @foreach($workout_unique as $post)
          @if($weight_point != $post['weight'] || $rep_point != $post['rep'])
          @php
            $rank = $cnt;
          @endphp
          @endif
          @if($rank <= 20)
          <tr>
            <td>{{ $rank }} </td>
            <td><a href="/users/{{$post->user->id}}">{{ $post->user->name}}</a></td>  
            <td>@if($post->weight == null)-@endif{{ $post->weight }}</td>
            <td>{{ $post->rep }}</td>
            <td>{{ $post->created_at->format("Y/m/d")}}</td>
          </tr>
          @endif
          @php
          $weight_point = $post['weight'] ;
          $rep_point = $post['rep'] ;
          $cnt++;
          @endphp
          @endforeach
        </table>
        
        <table class="table_box pt-3">
          <tr>
            <th>あなたの順位</th>
            <th>ウェイト（kg）</th>
            <th>回数</th>
            <th>投稿日</th>
          </tr>
          @php
          $rank = 1;
          $cnt = 1;
          $weight_point = 0;
          $rep_point = 0;
          @endphp
          
          @foreach($workout_unique as $post)
          @if($weight_point != $post['weight'] || $rep_point != $post['rep'])
          @php
            $rank = $cnt;
          @endphp
          @endif
          @if($post->user->id == Auth::id())

          <tr>
            <td>{{ $rank }} </td>
            <td>@if($post->weight == null)-@endif{{ $post->weight }}</td>
            <td>{{ $post->rep }}</td>
            <td>{{ $post->created_at->format("Y/m/d")}}</td>
          </tr>
          @endif
          @php
          $weight_point = $post['weight'] ;
          $rep_point = $post['rep'] ;
          $cnt ++;
          @endphp
          @endforeach
        </table>
</div>
@endsection