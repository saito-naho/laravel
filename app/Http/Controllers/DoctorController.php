<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Shift;
use Illuminate\Http\Request;
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
       //
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
        dd($shift);
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
        //
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
        //
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
