<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function studentsreport()
    {
        return view('admin.reports.studentsreport');
    }
}
