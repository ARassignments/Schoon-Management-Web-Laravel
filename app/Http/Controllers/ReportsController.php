<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function studentsreport()
    {
        return view('admin.reports.studentsreport');
    }
    public function removestudents()
    {
        return view('admin.reports.removestudents');
    }
    public function notremovestudents()
    {
        return view('admin.reports.notremovestudents');
    }
}
