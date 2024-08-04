<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactfom extends Model
{
    use HasFactory;
    protected $table = 'contactadmin';
    protected $fillable = ['name', 'email', 'subject', 'message'];
    
}
