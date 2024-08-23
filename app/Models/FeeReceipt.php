<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeReceipt extends Model
{
    use HasFactory;
    public function students_add()
    {
        return $this->belongsTo(Admissionform::class, 'gr_number', 'gr_number');
    }
}
