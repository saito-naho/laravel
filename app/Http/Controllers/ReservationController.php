<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Reservation;
use App\Doctor;
use App\Shift;

class ReservationController extends Controller
{
    private $times = [
        "time1"=>"10:00-10:30",
        "time2"=>"10:30-11:00",
        "time3"=>"11:00-11:30",
        "time4"=>"11:30-12:00",
        "time5"=>"14:00-14:30",
        "time6"=>"14:30-15:00",
        "time7"=>"15:00-15:30",
        "time8"=>"15:30-16:00",
        "time9"=>"16:00-16:30",
        "time10"=>"16:30-17:00",
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'headache' => 'required',
            'stomachache' => 'required',
            'time' => 'required',
            'date_at' => 'required',
        ]);
        $time = $this->times[$request->time];
        $data = DB::table('doctors')
        ->rightjoin('shifts','doctors.id','=','shifts.doctor_id')
        ->rightjoin('reservations','shifts.doctor_id','=','reservations.doctor_id')
        ->where('shifts.'.$request->time,1)
        ->where(function($query) use($request,$time) {
            $query->where('reservations.date_at', '!=', $request->date_at)
                  ->Where('reservations.time', '!=', $time);
        })
        ->select('doctors.id')
        ->first();
       
        if(empty($data)){
            return redirect()->route('resevation.create')->with('status', '別の日時を選択してください。');
        }
        
        $reserve = new Reservation;
        
        
        $reserve->user_id = Auth::id();
        $reserve->doctor_id = $data->id;
        $reserve->haedache = $request->headache;
        $reserve->stomachache = $request->stomachache;
        $reserve->symptoms = $request->symptoms;
        $reserve->memo = $request->memo;
        $reserve->comment = $request->comment;
        $reserve->time = $time;
        $reserve->date_at = $request->date_at;

        $reserve->save();
        return redirect()->route('user.index')->with('status', '予約を完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserve = Reservation::find($id);
        return view('reservation.show',['reserve'=>$reserve]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserve = Reservation::find($id);
        $reserve->time = array_search($reserve->time,$this->times);
        return view('reservation.edit',['reserve'=>$reserve]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'headache' => 'required',
            'stomachache' => 'required',
            'time' => 'required',
            'date_at' => 'required',
        ]);
        $reserve = Reservation::find($id);


        $time = $this->times[$request->time];
        $data = DB::table('doctors')
        ->rightjoin('shifts','doctors.id','=','shifts.doctor_id')
        ->rightjoin('reservations','shifts.doctor_id','=','reservations.doctor_id')
        ->where('shifts.'.$request->time,1)
        ->where(function($query) use($request,$time) {
            $query->where('reservations.date_at', '!=', $request->date_at)
                  ->Where('reservations.time', '!=', $time);
        })
        ->select('doctors.id')
        ->first();
       
        if(empty($data)){
            return redirect()->route('reservation.create')->with('status', '別の日時を選択してください。');
        }
        
        
        $reserve->doctor_id = $data->id;
        $reserve->haedache = $request->headache;
        $reserve->stomachache = $request->stomachache;
        $reserve->symptoms = $request->symptoms;
        $reserve->memo = $request->memo;
        $reserve->comment = $request->comment;
        $reserve->time = $time;
        $reserve->date_at = $request->date_at;

        $reserve->save();
        return redirect()->route('user.index')->with('status', '予約を変更しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve = Reservation::find($id);
        $reserve->delete();
        return redirect()->route('user.index')->with('status', 'キャンセルしました');
    }
}
