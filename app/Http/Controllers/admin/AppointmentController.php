<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentDate;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //
    public function store(Request $request)
    {
        # code...
        
        $appointment=Appointment::create([
            'appointment_name'=>$request->appointment_name,
            'appointment_date'=>$request->appointment_date,
            'status'=>'available',

        ]);

        return response()->json($appointment);
    }

    public function newDate($appointment_id,Request $request){
        $appointment=Appointment::find($appointment_id);

        $appointment_date=AppointmentDate::create([
            'appointment_date'=>$request->appointment_date,
            'status'=>$request->status,
            'user_id'=>null,

            'appointment_id'=>$appointment_id,
        ]);

        $appointment->appointment_dates()->save($appointment_date);

        return response()->json($appointment_date);

    }
}
