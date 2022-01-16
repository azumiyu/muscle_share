<?php

namespace App\Http\Controllers;

use App\User;
use App\Workout;
use App\Post;
use App\Category;
use App\Personal;
use App\Http\Requests\PersonalRequest;
use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use Auth;

class PersonalController extends Controller
{
	public function index(User $user,Request $request){
		//year_monthの年月と一致する体重をdate_keyの昇順に取得	
		$year_month = $request->year_month;
		$users = $user->personals2($year_month);
		if(Auth::id() == $user->id){
			$logs = $users->sortBy("date_key");
			$weihgt_log = [];
			$date_log = [];
			$log = '';
			foreach($logs as $log){
				$weihgt_log[] = $log->weight;
				$date_log[] = $log->date_key;
			}
			
			// 体重入力欄に載せるための体重データを取得
			foreach($user->personals->sortBy('date_key') as $personal){
				$log = $personal->weight;
			}
			
			return view("personals.index",[
				"label" => $date_log,
				"weight_log" => $weihgt_log,
			])->with([
				'year_month' => $year_month,
				'log' => $log
				]);
		}
		return redirect('/')->with('flash_message', '他の人の体重は見れません。');
	}
	
	public function store(PersonalRequest $request, Personal $personal)
    {
        $input = $request['personal'];
        $personal->fill($input)->save();
        return back();
    }
}


