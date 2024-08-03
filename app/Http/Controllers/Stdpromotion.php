<?php

namespace App\Http\Controllers;

use App\Models\Admissionform;
use App\Models\Classes;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\contactfom;

class Stdpromotion extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function studentpromotion()
    {

        $add = Admissionform::all();
        $notificationCount=contactfom::count();
        $contacts=contactfom::all();
        $class = Classes::distinct()->pluck('class_name');
        $sections = Classes::distinct()->pluck('section_name');
        return view('admin.studentpromotion', compact('add', 'class', 'sections','notificationCount','contacts'));
    }

    // public function promoteStudents(Request $request)
    // {
    //     $updatedCount = Admissionform::where('current_class', $request->from_class)
    //         ->where('section', $request->from_section)
    //         ->update([
    //             'current_class' => $request->to_class,
    //             'section' => $request->to_section
    //         ]);

    //     if ($updatedCount > 0) {
    //         return redirect()->back()->with('success', 'Students promoted successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'No students found matching the criteria.');
    //     }
    // }
    public function promoteStudents(Request $request)
    {
        $fromClass = $request->input('from_class');
        $fromSection = $request->input('from_section');
        $toClass = $request->input('to_class');
        $toSection = $request->input('to_section');
        $excludedStudents = $request->input('excluded_students', []);

        // Fetch students that are being promoted
        $students = Admissionform::where('current_class', $fromClass)
            ->where('section', $fromSection)
            ->whereNotIn('id', $excludedStudents)
            ->whereNotIn('Status', ['Pass Out', 'Left Out']) // Exclude students with Pass Out or Left Out status
            ->get();

        foreach ($students as $student) {
            $student->current_class = $toClass;
            $student->section = $toSection;
            $student->save();
        }

        return response()->json(['success' => 'Students promoted successfully!']);
    }



    public function getStudents(Request $request)
    {
        // $class = $request->input('from_class');
        // $section = $request->input('from_section');

        // $students = Admissionform::where('current_class', $class)
        //                       ->where('section', $section)
        //                       ->get();
        //                       dd($students);die();

        // return response()->json($students);

        $class = $request->input('from_class');
        $section = $request->input('from_section');

        $students = Admissionform::where('current_class', $class)
            ->where('section', $section)
            ->get();

        return response()->json($students);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
