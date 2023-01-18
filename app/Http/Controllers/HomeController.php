<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Shift;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($yearMonth = null)
    {
        $role = Auth::user()->role;
        if($role == 2){
            return view('home');
        }
        elseif($role==1){
            $shift=Shift::where('doctor_id',Auth::id())->first();


            // 前日と翌日
            $now = Carbon::now();
            if(!empty($yearMonth)){
                if(!preg_match('/^([1-9][0-9]{3})\-(0[1-9]{1}|1[0-2]{1})-(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/', $yearMonth)){
                    abort(404);
                }

                $day = new Carbon($yearMonth);
                $today    = $day->format('Y-m-d');
                $nextday  = $day->addDay()->format('Y-m-d');
                $preday   = $day->subDay(2)->format('Y-m-d');

            }else{
                $today    = $now->format('Y-m-d');
                $nextday  = $now->addDay()->format('Y-m-d');
                $preday   = $now->subDay(2)->format('Y-m-d');
            }

            //翌日が7日以内かチェック 
            $diff = (new Carbon($nextday))->diffInDays($now);
            $bool = $diff<=7 ? true : false;

            return view('doctor.home',[
                'shift'=>$shift,
                'today' => $today,
                'preday' => $preday,
                'nextday' => $nextday,
                'bool' => $bool,
            ]);
        }
        else{
            return view('home');
        }

    }

};