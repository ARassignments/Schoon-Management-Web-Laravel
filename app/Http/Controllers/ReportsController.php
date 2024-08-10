<?php

namespace App\Http\Controllers;
use App\Models\AdmissionForm;
use App\Models\ContactFom;
use App\Models\ClassFeeVoucher;
use App\Models\FeeReceipt;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function studentsreport()
    {
        $add = AdmissionForm::all();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.studentsreport',compact('add','notificationCount','contacts'));
    }
    public function removestudents()
    {
        $add = AdmissionForm::where('status','=','Left Out')->orwhere('status','=','Pass Out')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.removestudents',compact('add','notificationCount','contacts'));
    }
    public function notremovedstudents()
    {
        $add = AdmissionForm::where('status','=','Current')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.notremovedstudents',compact('add','notificationCount','contacts'));
    }
    public function strengthstudents()
    {
        $add = AdmissionForm::select('class', \DB::raw('count(*) as total'))->groupBy('class')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.studentsstrength',compact('add','notificationCount','contacts'));
    }
    public function classstrength()
    {
        $add = AdmissionForm::select('class', 'section', \DB::raw('count(*) as total'))->groupBy('class', 'section')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.classstrength',compact('add','notificationCount','contacts'));
    }
    //Students Reports
    public function allstudentsreport()
    {
        $add = AdmissionForm::all();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.allstudentsreport',compact('add','notificationCount','contacts'));
    }
    
    public function leftstudentsreport()
    {
        $add = AdmissionForm::where('status','=','Left Out')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.leftstudentsreport',compact('add','notificationCount','contacts'));
    }
    public function passstudentsreport()
    {
        $add = AdmissionForm::where('status','=','Pass Out')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.passstudentsreport',compact('add','notificationCount','contacts'));
    }
    public function currentstudentsreport()
    {
        $add = AdmissionForm::where('status','=','Current')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.currentstudentsreport',compact('add','notificationCount','contacts'));
    }
    public function defaulterstudents()
    {
        $add = ClassFeeVoucher::with('students_add')->where('pre_dues', '>', 0)->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.defaulterstudents',compact('add','notificationCount','contacts'));
    }
    public function studentsledger()
    {
        $add = AdmissionForm::where('status','=','Current')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.studentsledger',compact('add','notificationCount','contacts'));
    }
    public function studentslist()
    {
        $add = AdmissionForm::all();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.studentslist',compact('add','notificationCount','contacts'));
    }
    public function individualstudents()
    {
        $add = AdmissionForm::where('status','=','Current')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.currentstudentsreport',compact('add','notificationCount','contacts'));
    }
    public function receiptdetails()
    {
        $add = FeeReceipt::with('students_add')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.currentstudentsreport',compact('add','notificationCount','contacts'));
    }
    public function receiptreports()
    {
        $add = AdmissionForm::where('status','=','Current')->get();
        $contacts = contactfom::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        return view('admin.reports.currentstudentsreport',compact('add','notificationCount','contacts'));
    }
    
}
