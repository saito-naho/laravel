<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $user = UserInfo::where('user_id',$id)->first();
        if(empty($user)){
            return redirect()->route('user.create');
        }
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
        return redirect()->route('home')->with('status', '登録が完了しました');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション 
        $request->validate([
            'tel' => 'required',
            'birth' => 'required',
            'address' => 'required',
            'imagefront' => 'required',
            'imageback' => 'required',
        ]);

        // ディレクトリ名
        $dir = 'images';

        // アップロードされたファイル名を取得
        $front = $request->file('imagefront')->getClientOriginalName();
        $back = $request->file('imageback')->getClientOriginalName();

        // sampleディレクトリに画像を保存
        $request->file('imagefront')->storeAs('public/' . $dir, $front);
        $request->file('imageback')->storeAs('public/' . $dir, $back);


        // ファイル情報をDBに保存
        $user = new UserInfo();
        $user->imagefront = $front;
        $user->imageback = $back;
        $user->user_id = Auth::id();
        $user->tel = $request->tel;
        $user->birth = $request->birth;
        $user->address = $request->address;

        $user->save();

        return redirect()->route('home')->with('status', '登録が完了しました');
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

        // ディレクトリ名
        $dir = 'images';

        if(!empty($request->imagefront)){
            $front = $request->file('imagefront')->getClientOriginalName();
            $request->file('imagefront')->storeAs('public/' . $dir, $front);
            $user->imagefront = $front;
        }
        if(!empty($request->imageback)){
            $back = $request->file('imageback')->getClientOriginalName();
            $request->file('imageback')->storeAs('public/' . $dir, $back);
            $user->imageback = $back;
        }


        $user->tel = $request->tel;
        $user->birth = $request->birth;
        $user->address = $request->address;
        
        
        $user->save();

        return redirect()->route('user.index')->with('status', '情報更新が完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DB::table('user_info')->where('user_id',$id)
        ->delete();
        return redirect()->route('user.index')->with('status', 'ユーザー情報を削除しました');
    }
}
