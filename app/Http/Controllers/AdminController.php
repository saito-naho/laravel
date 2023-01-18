<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\User;
use App\Shift;
use App\Reservation;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // 今日翌日前日取得
        $now = Carbon::now();
        $today    = $now->format('Y-m-d');
        $nextday  = $now->addDay()->format('Y-m-d');
        $preday   = $now->subDay(2)->format('Y-m-d');

        //翌日が7日以内かチェック 
        $diff = (new Carbon($nextday))->diffInDays($now);
        $bool = $diff<=7 ? true : false;

        // 予約一覧取得
        $lists = Reservation::with('user')
        ->where('date_at','like',"%$today%")
        ->orderBy('id','desc')
        ->paginate(30);
        // dd($lists);

        return view('admin.home', [
            'lists' => $lists,
            'today' => $today,
            'preday' => $preday,
            'nextday' => $nextday,
            'bool' => $bool,
        ]);
    }

    public function alterYearMonth($yearMonth)
    {
        if(!preg_match('/^([1-9][0-9]{3})\-(0[1-9]{1}|1[0-2]{1})-(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/', $yearMonth)){
            abort(404);
        }

        // 前日と翌日
        $now = Carbon::now();

        $day = new Carbon($yearMonth);
        $today    = $day->format('Y-m-d');
        $nextday  = $day->addDay()->format('Y-m-d');
        $preday   = $day->subDay(2)->format('Y-m-d');

        //翌日が7日以内かチェック 
        $diff = (new Carbon($nextday))->diffInDays($now);
        $bool = $diff<=7 ? true : false;

        // 予約一覧取得
        $lists = Reservation::with('user')
        ->where('date_at','like',"%$today%")
        ->orderBy('id','desc')
        ->paginate(30);
        

        return view('admin.home',[
            'lists'=>$lists,
            'today' => $today,
            'preday' => $preday,
            'nextday' => $nextday,
            'bool' => $bool,
        ]);
    }
    public function getDoctorList(){
        $doctors = Doctor::orderBy('id','desc')->get();
        return view('admin.doctorlist',['doctors' => $doctors]);
    }
    public function getPatientList(){
        $patients = User::where('role',0)->orderBy('id','desc')->get();
        return view('admin.patientlist',['patients' => $patients]);
    }
}
