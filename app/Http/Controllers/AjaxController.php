<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AjaxController extends Controller
{
    public function getPatient($id){
        $user = User::join('user_info','users.id','=','user_info.user_id')
        ->where('users.id',$id)
        ->first();
        return response()->json($user);
    }
}
