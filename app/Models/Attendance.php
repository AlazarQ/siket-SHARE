<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Attendance extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['shareholder_id', 'meeting_id', 'attended'];

    public function shareholder()
    {
        return $this->belongsTo(Shareholder::class);
    }

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
