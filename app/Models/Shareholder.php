<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Shareholder extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'email', 'phone', 'address', 'country', 'nationality', 'shares', 'sharesPaid', 'remark', 'shareholder_documents', 'user_id'];

    protected $casts = [
        'shares' => 'decimal:2', // For share values with decimal precision
        'sharesPaid' => 'decimal:2',
    ];
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
