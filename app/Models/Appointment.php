<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_name',
       
    ];
    
    public function appointment_dates(){
        return $this->hasMany(AppointmentDate::class);
    }
    
}
