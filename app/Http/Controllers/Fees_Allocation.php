<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\contactfom;
use App\Models\Fees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Fees_Allocation extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function feeallocation()
    {
        $feeall = Fees::all();
        $class = Fees::pluck('class');
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        return view('admin.feeallocation', compact('feeall', 'class', 'notificationCount', 'contacts'));
    }

    public function getStudents($class)
    {
        $students = Fees::where('class', $class)->get(); // Adjust this query based on your database structure

        return response()->json($students);
    }

    public function addfeeallocation()
    {
        $feealls = DB::table('classes')->pluck('class_name')->toArray();
        $feealo = Classes::select('class_name')->distinct()->get();
        $feeall = Fees::all();
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        return view('admin.addfeeallocation', compact('feeall', 'feealls', 'feealo', 'notificationCount', 'contacts'));
    }

    public function storefeeallocation(Request $request)
    {
        // Validation rules
        $request->validate([
            'class' => 'required',
            'admission' => ['required', 'numeric', 'regex:/^\d+$/'],
            'tution' => ['required', 'numeric', 'regex:/^\d+$/'],
            'annual' => ['required', 'numeric', 'regex:/^\d+$/'],
            'exam_fee' => ['required', 'numeric', 'regex:/^\d+$/'],
            'lab_charges' => ['required', 'numeric', 'regex:/^\d+$/'],
            'late_fee' => ['required', 'numeric', 'regex:/^\d+$/'],
            'pre_dues' => ['required', 'numeric', 'regex:/^\d+$/'],
            'id_card' => ['required', 'numeric', 'regex:/^\d+$/'],
            'board_fee' => ['required', 'numeric', 'regex:/^\d+$/'],
            'stationary' => ['required', 'numeric', 'regex:/^\d+$/'],
        ]);

        $existingFees = Fees::where('class', $request->class)->first();

        if ($existingFees) {
            return redirect()->back()->with('error', "Fees record for class {$request->class} already exists.");
        }    

        // Storing the validated data
        $Fees = new Fees();
        $Fees->class = $request->class;
        $Fees->admission = $request->admission;
        $Fees->tution = $request->tution;
        $Fees->annual = $request->annual;
        $Fees->exam_fee = $request->exam_fee;
        $Fees->lab_charges = $request->lab_charges;
        $Fees->late_fee = $request->late_fee;
        $Fees->pre_dues = $request->pre_dues;
        $Fees->id_card = $request->id_card;
        $Fees->board_fee = $request->board_fee;
        $Fees->stationary = $request->stationary;

        $studentClass = $Fees->class;
        $Fees->save();

        return redirect('feeallocation')->with('success', "The record of student in class $studentClass has been successfully submitted, and the class fee has been saved.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editfeeallocation(string $id)
    {
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        $Fee = Fees::find($id);
        return view('admin.editfeeallocation', compact('Fee', 'notificationCount', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatefeeallocation(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'class' => 'required|string|max:255',
            'admission' => 'required|numeric',
            'tution' => 'required|numeric',
            'annual' => 'required|numeric',
            'exam_fee' => 'required|numeric',
            'lab_charges' => 'required|numeric',
            'late_fee' => 'required|numeric',
            'pre_dues' => 'required|numeric',
            'id_card' => 'required|numeric',
            'board_fee' => 'required|numeric',
            'stationary' => 'required|numeric',
        ]);

        // Find the fee record by ID
        $Fee = Fees::find($id);

        // Update the fee record with validated data
        $Fee->class = $request->class;
        $Fee->admission = $request->admission;
        $Fee->tution = $request->tution;
        $Fee->annual = $request->annual;
        $Fee->exam_fee = $request->exam_fee;
        $Fee->lab_charges = $request->lab_charges;
        $Fee->late_fee = $request->late_fee;
        $Fee->pre_dues = $request->pre_dues;
        $Fee->id_card = $request->id_card;
        $Fee->board_fee = $request->board_fee;
        $Fee->stationary = $request->stationary;

        // Save the updated fee record
        $studentClass = $Fee->class;
        $Fee->update();

        // Redirect to feeallocation page with success message
        return redirect('feeallocation')->with('successupdate', "The record of the student in class $studentClass has been successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyfeeallocation(int $id)
    {
        $Fee = Fees::find($id);
        $Fee->delete();
        return back()->with('successdelete', 'Record deleted successfully!');
    }
}
