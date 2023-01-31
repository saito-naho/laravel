<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Doctor;
use App\Admin;
use App\Reservation;

class AjaxController extends Controller
{
    public function getPatient($id){

        $user = User::join('user_info','users.id','=','user_info.user_id')
        ->join('reservations','users.id','=','reservations.user_id')
        ->where('users.id',$id)
        ->first();
        $doctorName = Doctor::find($user['doctor_id'])->user->name;
        
        return response()->json([$user,$doctorName]);
    }

    public function getDoctor($id){
        $doctor = Doctor::join('shifts','doctors.id','=','shifts.doctor_id')
        ->where('doctors.id',$id)
        ->first();
        return response()->json($doctor);
    }

}
