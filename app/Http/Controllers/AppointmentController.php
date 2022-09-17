<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentDate;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //
    public function index()
    {
        $appointments = Appointment::all();
        return view('home', ['appointments' => $appointments]);
    }

    public function book($date_id)
    {
        $appointment_date = AppointmentDate::find($date_id);
        $appointment_date->user_id = auth()->user()->id;
        $appointment_date->save();
        return response()->json($appointment_date);
    }
}
