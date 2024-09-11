<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Admissionform extends Model
// {
//     use HasFactory;
    
// }
class Admissionform extends Model
{
    protected $table = 'admission_forms'; // Table ka actual naam yahaan specify karein
    public function fees()
    {
        return $this->hasMany(ClassFeeVoucher::class, 'gr_number', 'gr_number');
    }
    public function feeVouchers()
    {
        return $this->hasMany(ClassFeeVoucher::class, 'gr_number', 'gr_number');
    }
}
