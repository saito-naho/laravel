<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserInfo;
use App\Reservation;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();

        $reservationId = Reservation::select('id')->where('user_id',$id)->get();
        // dd($reservationId);
        return view('user.home',['reservationId'=>$reservationId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::join('user_info','users.id','=','user_info.user_id')
        ->where('users.id',$id)
        ->first();
        return view('user.showUserInfo',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::join('user_info','users.id','=','user_info.user_id')
        ->where('users.id',$id)
        ->first();
        return view('user.edit',['user'=>$user]);
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
        $user = UserInfo::findOrFail($id);
        
        //バリデーション 
        $request->validate([
            'tel' => 'required',
            'birth' => 'required',
            'address' => 'required',
        ]);

        $user->tel = $request->tel;
        $user->birth = $request->birth;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('home')->with('status', '情報更新が完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
