<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactfom;

class Special_Fees_Generate_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function special_fees_generate()
     {
        $notificationCount=contactfom::count();
        $contacts=contactfom::all();
         return view('admin.special-fees-generate',compact('notificationCount', 'contacts'));
     }

    public function index()
    {
        //
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
