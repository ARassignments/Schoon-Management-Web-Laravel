<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\contactfom;
use Illuminate\Http\Request;

class Classes_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search') ?? "";
        if ($search != "") {
            //where
            $class  = Classes::where('class_name', 'LIKE', "%$search%")->orWhere('section_name', 'LIKE', "%$search%")->orWhere('created_at', 'LIKE', "%$search%")->orWhere('updated_at', 'LIKE', "%$search%")->get();
        } else {
            $class  = Classes::all();
        }

        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        $class  = compact('class', 'search', 'notificationCount', 'contacts');
        return view('admin.class')->with($class);
    }

    public function addclass()
    {
        $notificationCount = contactfom::count();
        $contacts = contactfom::all();
        return view('admin.addclass', compact('notificationCount', 'contacts'));
    }

    public function storeclass(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'section_name' => 'required|string|max:255',
        ]);

        $class = new Classes();
        $class->class_name = $request->class_name;
        $class->section_name = $request->section_name;
        $class_name = $class->class_name;
        $section_name = $class->section_name;
        $class->save();

        return redirect('class')->with('success', "The record has been submitted successfully! Class $class_name and section $section_name have been submitted.");
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

    public function editclass(string $id)
    {
        $class = Classes::find($id);
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        return view('admin.editclass', compact('class', 'notificationCount', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateclass(Request $request, string $id)
    {
        $class = Classes::find($id);
        $class->class_name = $request->class_name;
        $class->section_name = $request->section_name;
        $class_name = $class->class_name;
        $section_name = $class->section_name;
        $class->update();
        return redirect('class')->with('success', "Record has been updated successfully! The class $class_name and section $section_name have been successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroycalsses(int $id)
    {
        $class = Classes::find($id);
        $class_name = $class->class_name;
        $section_name = $class->section_name;
        $class->delete();
        return back()->with('successdelete', "Record deleted successfully! The class $class_name and section $section_name have been removed.");
    }
}
