<?php

namespace App\Http\Controllers;

use App\Models\contactfom;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class contactform extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = contactfom::paginate(8); // Set pagination to 8
        $notificationCount = contactfom::where('is_new', true)->count(); // Count new messages
        $clearnotifications = contactfom::all();
        return view('admin.contactpage', compact('contacts', 'notificationCount', 'clearnotifications'));
    }

    // public function markAsRead($id)
    // {
    //     $contact = contactfom::find($id);
    //     if ($contact) {
    //         $contact->is_new = false;
    //         $contact->save();
    //     }
    //     return redirect()->back(); // Redirect back to the previous page
    // }

    public function show(Request $request)
    {
        $contactId = $request->query('contact_id');
        $contacts = contactfom::paginate(8); // Existing pagination
        return view('admin.contactpage', compact('contacts', 'contactId'));
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        $contact = contactfom::where('email', $request->email)->first();
    
        if ($contact) {
            $contact->message .= "\n" . $request->message;
            $contact->updated_at = now(); // Update timestamp
            $contact->save();
        } else {
            contactfom::create($validatedData);
        }
    
        return response()->json([
            'success' => 'Your message has been sent successfully!',
            'message' => $request->message
        ]);
    }
    
    




public function clearNotification(Request $request)
{
    $contactId = $request->input('contact_id');
    $contact = contactfom::find($contactId);
    if ($contact) {
        $contact->is_new = 0; // Mark as read
        $contact->save();
    }

    return response()->json(['success' => true]);
}


public function clearAllNotifications(Request $request)
{
    // Optionally, you can filter notifications if needed
    contactfom::where('is_new', 1)->update(['is_new' => 0]);

    return response()->json(['success' => true]);
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
