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

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift=Shift::where('doctor_id',Auth::id())->first();

        // 前日と翌日
        $now = Carbon::now();
        $today    = $now->format('Y-m-d');
        $nextday  = $now->addDay()->format('Y-m-d');
        $preday   = $now->subDay(2)->format('Y-m-d');

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
    public function alterYearMonth($yearMonth)
    {
        if(!preg_match('/^([1-9][0-9]{3})\-(0[1-9]{1}|1[0-2]{1})-(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/', $yearMonth)){
            abort(404);
        }
        $shift=Shift::where('doctor_id',Auth::id())->first();

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

        return view('doctor.home',[
            'lists' => $lists,
            'shift' => $shift,
            'today' => $today,
            'preday' => $preday,
            'nextday' => $nextday,
            'bool' => $bool,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.createShift');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'time1' => 'boolean',
            'time2' => 'boolean',
            'time3' => 'boolean',
            'time4' => 'boolean',
            'time5' => 'boolean',
            'time6' => 'boolean',
            'time7' => 'boolean',
            'time8' => 'boolean',
            'time9' => 'boolean',
            'time10' => 'boolean',
        ]);
        
        $shift = new Shift;

        $shift->doctor_id = Auth::id();
        $shift->time1 = !empty($request->time1) ? $request->time1 : 0;
        $shift->time2 = !empty($request->time2) ? $request->time2 : 0;
        $shift->time3 = !empty($request->time3) ? $request->time3 : 0;
        $shift->time4 = !empty($request->time4) ? $request->time4 : 0;
        $shift->time5 = !empty($request->time5) ? $request->time5 : 0;
        $shift->time6 = !empty($request->time6) ? $request->time6 : 0;
        $shift->time7 = !empty($request->time7) ? $request->time7 : 0;
        $shift->time8 = !empty($request->time8) ? $request->time8 : 0;
        $shift->time9 = !empty($request->time9) ? $request->time9 : 0;
        $shift->time10 = !empty($request->time10) ? $request->time10 : 0;
        $shift->save();

        return redirect()->route('home')->with('status', 'シフト登録が完了しました');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $shift=Shift::where('doctor_id',$doctor->id)->first();
        return view('doctor.editShift',[
            'shift'=>$shift,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $shift = Shift::find($request->id);

        // 医者のチェック
        if($shift->doctor_id != $doctor->id){
            abort(403);
        }
        $validatedData = $request->validate([
            'time1' => 'boolean',
            'time2' => 'boolean',
            'time3' => 'boolean',
            'time4' => 'boolean',
            'time5' => 'boolean',
            'time6' => 'boolean',
            'time7' => 'boolean',
            'time8' => 'boolean',
            'time9' => 'boolean',
            'time10' => 'boolean',
        ]);
        
        $shift->time1 = !empty($request->time1) ? $request->time1 : 0;
        $shift->time2 = !empty($request->time2) ? $request->time2 : 0;
        $shift->time3 = !empty($request->time3) ? $request->time3 : 0;
        $shift->time4 = !empty($request->time4) ? $request->time4 : 0;
        $shift->time5 = !empty($request->time5) ? $request->time5 : 0;
        $shift->time6 = !empty($request->time6) ? $request->time6 : 0;
        $shift->time7 = !empty($request->time7) ? $request->time7 : 0;
        $shift->time8 = !empty($request->time8) ? $request->time8 : 0;
        $shift->time9 = !empty($request->time9) ? $request->time9 : 0;
        $shift->time10 = !empty($request->time10) ? $request->time10 : 0;
        $shift->save();

        return redirect()->route('doctor.index')->with('status', 'シフト更新が完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
