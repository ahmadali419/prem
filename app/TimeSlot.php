<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $fillable = ['booking_date', 'booking_from_time', 'booking_to_time', 'status'];
}
