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
		$year_month = $request->year_month;
		$users = $user->personals2($year_month);
		if(Auth::id() == $user->id){
			$logs = $users->sortBy("date_key");
			$weihgt_log = [];
			$date_log = [];
			$log = '';
			$date_key='';
			foreach($logs as $log){
				$weihgt_log[] = $log->weight;
				$date_log[] = $log->date_key;
			}
			
			foreach($user->personals->sortBy('date_key') as $personal){
				$log = $personal->weight;
				$date_key = $personal->date_key;
			}
			
			return view("personals.index",[
				"label" => $date_log,
				"weight_log" => $weihgt_log,
			])->with([
				'year_month' => $year_month,
				'log' => $log,
				'date_key' => $date_key,
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


