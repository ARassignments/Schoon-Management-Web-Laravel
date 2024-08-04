<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassFeeVoucher extends Model
{
    use HasFactory;

    protected $table = 'class_fees_generate';

    protected $fillable = [
        'student_id', 'transaction_date', 'issued_date', 'due_date', 'session', 'month_year',
        'admission', 'tuition', 'annual', 'exam_fee', 'lab_charges', 'late_fee', 'pre_dues', 'id_card', 'board_fee', 'stationary', 'total',
        'previous_dues', 'total_payable_within_due_date', 'total_payable_after_due_date', 'class', 'section'
    ];

    public function student()
    {
        return $this->belongsTo(Admissionform::class, 'student_id');
    }
}