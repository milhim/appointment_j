<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDate extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_date',
        'status',
        'user_id',
        'appointment_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
