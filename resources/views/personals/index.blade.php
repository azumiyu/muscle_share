@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-5 posts-title">あなたの体重記録</h1>
    <p class="title__error" style="color:red">{{ $errors->first('personal.weight') }}</p>
    <p class="title__error" style="color:red">{{ $errors->first('personal.date_key') }}</p>
    <form>
        <label for="month">月ごとの記録</label>
        <input type="month" name="year_month" min="2000-01" max="2100-12">
        <input type="submit" value="表示" class="common-submit">
    </form>
    <h3 class="text-center pt-2">@if($year_month != null){{ $year_month}}月の体重記録@else全体重記録@endif</h3>
    @if($date_key != date('Y-m-d'))
	<div class="content">
	<a class="js-modal-open common-submit">今日の体重追加</a>
	</div>
	@else
	<a class="common-submit" onclick='return confirm("今日の体重はすでに記録済みです！")'>今日の体重追加</a>
	@endif
	<div class="modal js-modal">
	    <div class="modal__bg js-modal-close"></div>
	    <div class="modal__content">
	        <form action="/personals" method="POST">
	        	@csrf
	        	<p>体重を入力します。体重には最新日の記録が残っています。</p>
	        	<label for ="date">日付</label>
	        	<input id = "date" type="date" name="personal[date_key]" min="2000-01" max="2100-12" value="{{ date('Y-m-d') }}" readonly><br>
	        	<label for ="weight">体重</label>
	        	<input id ="weight" type="number" step="0.01" name="personal[weight]" placeholder="例:60" value="{{ $log }}">
	        	<input type = "submit" value = "入力">
	        	<input type = "hidden" value="{{ Auth::id() }}" name="personal[user_id]">
	        <a class="js-modal-close common-submit" href="">閉じる</a>
	    </div><!--modal__inner-->
    </div><!--modal-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
	<!-- グラフを描画 -->
   <script>
	let labels = @json($label);
	let weight_log = @json($weight_log);
	
	document.addEventListener('DOMContentLoaded', ready);
	function ready() {
   var ctx = document.getElementById("myChart").getContext("2d");
   var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: labels,
			datasets: [
				{
					xAxisID: 'xaxes_1',
					label: '体重',
					data: weight_log,
					borderColor: "rgba(0,0,255,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				},
			]
		},
		options: {
	      scales: {
	      "xaxes_1" : {
              ticks: {
	            autoSkip: true,
	            maxTicksLimit: 10
	          }
            }
	      }
    	}
	 });
   }
   </script>
   <!-- グラフを描画ここまで -->
   <canvas id="myChart"></canvas>
</div>

@endsection