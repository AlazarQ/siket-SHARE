<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['meeting_date', 'status'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
