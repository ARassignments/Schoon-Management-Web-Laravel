<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admissionform;
// use Illuminate\Support\Facades\Validator;
use App\Models\Classes;
use App\Models\contactfom;
use App\Models\FeeReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class admin_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? "";

        if ($search != "") {
            // Perform the search
            $add = Admissionform::where('gr_number', 'LIKE', "%$search%")
                ->orWhere('student_name', 'LIKE', "%$search%")
                ->orWhere('father_name', 'LIKE', "%$search%")
                ->orWhere('student_age', 'LIKE', "%$search%")
                ->orWhere('mobile_number', 'LIKE', "%$search%")
                ->orWhere('class', 'LIKE', "%$search%")
                ->orWhere('current_class', 'LIKE', "%$search%")
                ->orWhere('section', 'LIKE', "%$search%")
                ->orWhere('last_institute', 'LIKE', "%$search%")
                ->orWhere('fees', 'LIKE', "%$search%")
                ->orWhere('date_of_addmission', 'LIKE', "%$search%")
                ->orWhere('date_of_birth', 'LIKE', "%$search%")
                ->orWhere('address', 'LIKE', "%$search%")
                ->orWhere('created_at', 'LIKE', "%$search%")
                ->orWhere('updated_at', 'LIKE', "%$search%")
                ->get();
        } else {

            $add = Admissionform::all();
        }
        $today = Carbon::today()->toDateString();
        $feeReceiptsCount = FeeReceipt::whereDate('created_at', $today)->count();
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();
        $feeReceiptsCountMonthly = FeeReceipt::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        $addC = Admissionform::count();
        $class = Classes::count();
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        return view('admin.dashboard', compact('add', 'search', 'addC', 'class', 'notificationCount', 'contacts', 'feeReceiptsCount', 'feeReceiptsCountMonthly'));
    }
    public function voucher(Request $request)
    {
        $addC = Admissionform::count();
        $class = Classes::count();
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        return view('admin.voucher-class-fees', compact('addC', 'class', 'notificationCount', 'contacts'));
    }

    public function addmissionform(Request $request)
    {

        $search = $request->input('search') ?? "";
        if ($search != "") {
            //where
            $add = Admissionform::where('gr_number', 'LIKE', "%$search%")->orWhere('student_name', 'LIKE', "%$search%")->orWhere('father_name', 'LIKE', "%$search%")->orWhere('student_age', 'LIKE', "%$search%")->orWhere('mobile_number', 'LIKE', "%$search%")->orWhere('class', 'LIKE', "%$search%")->orWhere('current_class', 'LIKE', "%$search%")->orWhere('section', 'LIKE', "%$search%")->orWhere('last_institute', 'LIKE', "%$search%")->orWhere('fees', 'LIKE', "%$search%")->orWhere('date_of_addmission', 'LIKE', "%$search%")->orWhere('date_of_birth', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%")->orWhere('created_at', 'LIKE', "%$search%")->orWhere('updated_at', 'LIKE', "%$search%")->get();
        } else {
            $add = Admissionform::all();
        }
        // $add = compact('add', 'search');
        // return view('admin.addmissionform')->with($add);
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        $addmission = Admissionform::all();

        $add = compact('add', 'search', 'notificationCount', 'contacts', 'addmission');
        return view('admin.addmissionform')->with($add);

        // $add = Admissionform::all();
        // return view('admin.addmissionform', compact('add'));
    }

    public function addform()
    {

        $adddb = DB::table('classes')->pluck('section_name', 'class_name')->toArray();
        $adclass = Classes::select('class_name')->distinct()->get();
        $adsection = Classes::select('section_name')->distinct()->get();
        $addall = Admissionform::all();
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        return view('admin.addadmissionform', compact('adddb', 'adclass', 'adsection', 'addall', 'notificationCount', 'contacts'));
    }

    public function updateStatus(Request $request)
    {
        $admissionId = $request->input('id');
        $status = $request->input('status');

        // Validate and update the status
        $admission = Admissionform::find($admissionId);
        if ($admission) {
            $admission->status = $status;
            $admission->save();

            return response()->json(['success' => 'Status updated successfully!']);
        }

        return response()->json(['error' => 'Failed to update status.'], 400);
    }

    public function adminprofile()
    {
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        return view('admin.adminprofile', compact('notificationCount', 'contacts'));
    }

    public function addstudentpromotion()
    {
        return view('admin.addstudentpromotion');
    }

    public function storeaddmissionform(Request $request)
    {
        $request->validate([
            'gr_number' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'student_age' => 'nullable|integer',
            'mobile_number' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'current_class' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'last_institute' => 'nullable|string|max:255',
            'fees' => 'required|numeric',
            'date_of_addmission' => 'required|date',
            'date_of_birth' => 'required|date',
            'religion' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'discount' => 'nullable|numeric|min:0|max:100',
        ], [
            'fees.required' => 'Fees field is required.',
            'fees.numeric' => 'Fees field must contain only numbers.',
        ]);

        $dateOfAdmission = date('Y-m-d', strtotime($request->date_of_addmission));
        $dateOfBirth = date('Y-m-d', strtotime($request->date_of_birth));
        $fees = $request->input('fees');
        $discount = $request->input('discount', 0);
        $discountedFees = $fees - ($fees * ($discount / 100));

        $age = date_diff(date_create($dateOfBirth), date_create('today'))->y;

        $add = new Admissionform();
        $add->gr_number = $request->gr_number;
        $add->student_name = $request->student_name;
        $add->father_name = $request->father_name;
        $add->student_age = $age; // Store calculated age
        $add->mobile_number = $request->mobile_number;
        $add->class = $request->class;
        $add->current_class = $request->current_class;
        $add->section = $request->section;
        $add->last_institute = $request->last_institute;
        $add->date_of_addmission = $dateOfAdmission;
        $add->date_of_birth = $dateOfBirth;
        $add->religion = $request->religion;
        $add->address = $request->address;
        $add->fees = $discountedFees;
        $add->discount = $discount;

        $studentName = $add->student_name;
        $fatherName = $add->father_name;
        $add->save();

        return redirect('show-addmissionform')->with('success', "The record of student $studentName, son of $fatherName, has been successfully submitted!");
    }

    public function editaddmissionform(string $id)
    {
        $addmission = Admissionform::find($id);
        $classes = Classes::distinct()->pluck('class_name');
        $classessec = Classes::distinct()->pluck('section_name');
        $notificationCount = contactfom::where('is_new', true)->count(); // Count only unread notifications
        $contacts = contactfom::all();
        return view('admin.edit-admissionform', compact('addmission', 'classes', 'classessec', 'notificationCount', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateaddmissionform(Request $request, string $id)
    {
        // Validation rules
        $request->validate([
            'gr_number' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'student_age' => 'required|integer|min:1',
            'mobile_number' => 'required|string|max:20',
            'class' => 'required|string|max:255',
            'current_class' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'last_institute' => 'nullable|string|max:255',
            'fees' => 'required|numeric',
            'date_of_addmission' => 'required|date',
            'date_of_birth' => 'required|date',
            'religion' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        // Convert the date format if necessary
        $dateOfAdmission = date('Y-m-d', strtotime($request->date_of_addmission));
        $dateOfBirth = date('Y-m-d', strtotime($request->date_of_birth));
        $fees = $request->input('fees');
        $discount = $request->input('discount', 0); // Default to 0 if not provided
        $discountedFees = $fees - ($fees * ($discount / 100));

        // Find the Admissionform instance and update its data
        $add = Admissionform::find($id);
        $add->gr_number = $request->gr_number;
        $add->student_name = $request->student_name;
        $add->father_name = $request->father_name;
        $add->student_age = $request->student_age;
        $add->mobile_number = $request->mobile_number;
        $add->class = $request->class;
        $add->current_class = $request->current_class;
        $add->section = $request->section;
        $add->last_institute = $request->last_institute;
        $add->date_of_addmission = $dateOfAdmission;
        $add->date_of_birth = $dateOfBirth;
        $add->religion = $request->religion;
        $add->address = $request->address;
        $add->fees = $discountedFees;
        $add->discount = $discount;
        // Save the updated record
        $add->save();

        // Redirect with a success message
        $studentName = $add->student_name;
        $fatherName = $add->father_name;
        return redirect('show-addmissionform')->with('success', "The record of student $studentName, son of $fatherName, has been updated successfully!");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $addmission = Admissionform::find($id);
        $studentName = $addmission->student_name;
        $fatherName = $addmission->father_name;
        $addmission->delete();
        return back()->with('successdelete', "Record of student $studentName, son of $fatherName deleted successfully!");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
