<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $appointments=Appointment::all();
        
        return view('admin.dashboard',['appointments'=>$appointments]);
    }
}
