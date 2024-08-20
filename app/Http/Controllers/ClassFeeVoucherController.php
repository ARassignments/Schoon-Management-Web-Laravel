<?php

namespace App\Http\Controllers;

use App\Models\Admissionform;
use App\Models\ClassFeeVoucher;
use App\Models\contactfom;
use App\Models\Fees;
use Illuminate\Http\Request;

class ClassFeeVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */

    // public function class_fees_generate(Request $request)
    // {
    //     $selectedClass = $request->input('class');
    //     $selectedSection = $request->input('section');
    //     $selectedFees = $request->input('fees', []);

    //     $admis = Admissionform::where('current_class', $selectedClass)
    //     ->where('section', $selectedSection)
    //     ->whereNotIn('Status', ['Pass Out', 'Left Out'])
    //     ->get();

    //     $clases = Admissionform::distinct()->pluck('current_class');
    //     $secs = Admissionform::distinct()->pluck('section');
    //     $feecheck = Fees::where('class', $selectedClass)->get();

    //     $feesList = ClassFeeVoucher::all();
    //     $studentId = ClassFeeVoucher::all();

    //     $admissionfees = collect([]);
    //     if (!empty($selectedFees)) {
    //         $admissionfees = Fees::where('class', $selectedClass)
    //             ->select($selectedFees)
    //             ->distinct()
    //             ->get();
    //     }

    //     $notificationCount = contactfom::where('is_new', true)->count();
    //     $contacts = contactfom::all();

    //     return view('admin.class-fees-generate', compact(
    //         'admis',
    //         'clases',
    //         'secs',
    //         'selectedClass',
    //         'selectedSection',
    //         'feecheck',
    //         'admissionfees',
    //         'feesList',
    //         'studentId',
    //         'notificationCount',
    //         'contacts'
    //     ));
    // }
    public function class_fees_generate(Request $request)
    {
        $selectedClass = $request->input('class');
        $selectedSection = $request->input('section');

        $admis = Admissionform::where('current_class', $selectedClass)
            ->where('section', $selectedSection)
            ->whereNotIn('Status', ['Pass Out', 'Left Out'])
            ->get();

        $clases = Admissionform::distinct()->pluck('current_class');
        $secs = Admissionform::distinct()->pluck('section');

        $feecheck = Fees::where('class', $selectedClass)->get();
        $feesList = ClassFeeVoucher::all();
        $studentId = ClassFeeVoucher::all();
        $notificationCount = contactfom::where('is_new', true)->count();
        $contacts = contactfom::all();

        // Prepare data for the view
        return view('admin.class-fees-generate', compact(
            'admis',
            'clases',
            'secs',
            'selectedClass',
            'selectedSection',
            'feecheck',
            'feesList',
            'studentId',
            'notificationCount',
            'contacts'
        ));
    }
    public function showvoucher()
    {
        $notificationCount = contactfom::where('is_new', true)->count();
        $contacts = contactfom::all();
        // $voucher = ClassFeeVoucher::all();
        $voucher = ClassFeeVoucher::with('students_add')->get();
        return view('admin.showclassvoucher', compact('notificationCount', 'contacts', 'voucher'));
    }
    public function viewvoucher($id)
    {
        $notificationCount = contactfom::where('is_new', true)->count();
        $contacts = contactfom::all();
        $voucher = ClassFeeVoucher::with('students_add')->where('id', $id)->firstorfail();
        return view('admin.voucher-class-fees', compact('notificationCount', 'contacts', 'voucher'));
    }

    // public function store_class_voucher(Request $request)
    // {
    //     // Debugging
    //     // dd($request->all());

    //     $classvoucher = new ClassFeeVoucher();
    //     $classvoucher->gr_number = $request->gr_number;
    //     $classvoucher->transaction_date = $request->transaction_date;
    //     $classvoucher->issued_date  = $request->issued_date;
    //     $classvoucher->due_date  = $request->due_date;
    //     $classvoucher->session  = $request->session;
    //     $classvoucher->month_year  = $request->month_year;
    //     $classvoucher->class = $request->class;
    //     $classvoucher->section = $request->section;

    //     $fees = $request->input('fees', []);
    //     $fee_mapping = [
    //         'admission' => 'admission',
    //         'tution' => 'tution',
    //         'annual' => 'annual',
    //         'exam_fee' => 'exam_fee',
    //         'lab_charges' => 'lab_charges',
    //         'late_fee' => 'late_fee',
    //         'pre_dues' => 'pre_dues',
    //         'id_card' => 'id_card',
    //         'board_fee' => 'board_fee',
    //         'stationary' => 'stationary'
    //     ];

    //     foreach ($fee_mapping as $formKey => $dbColumn) {
    //         $classvoucher->{$dbColumn} = isset($fees[$formKey]) ? $fees[$formKey] : 0;
    //     }

    //     $classvoucher->save();

    //     return redirect()->back()->with('success', 'Class fee voucher created successfully!');
    // }

    // public function store_class_voucher(Request $request)
    // {
    //     // Extract class and section from request
    //     $selectedClass = $request->input('class');
    //     $selectedSection = $request->input('section');

    //     // Fetch students based on class and section
    //     $students = Admissionform::where('current_class', $selectedClass)
    //         ->where('section', $selectedSection)
    //         ->whereNotIn('Status', ['Pass Out', 'Left Out'])
    //         ->get();

    //     foreach ($students as $student) {
    //         $classvoucher = new ClassFeeVoucher();
    //         $classvoucher->gr_number = $student->gr_number; // Fetching from Admissionform
    //         $classvoucher->transaction_date = now(); // Or use a specific date
    //         $classvoucher->issued_date = now(); // Or use a specific date
    //         $classvoucher->due_date = $request->input('due_date');
    //         $classvoucher->session = $request->input('session');
    //         $classvoucher->month_year = $request->input('month_year');
    //         $classvoucher->class = $selectedClass;
    //         $classvoucher->section = $selectedSection;

    //         $fees = $request->input('fees', []);
    //         $fee_mapping = [
    //             'admission' => 'admission',
    //             'tution' => 'tution',
    //             'annual' => 'annual',
    //             'exam_fee' => 'exam_fee',
    //             'lab_charges' => 'lab_charges',
    //             'late_fee' => 'late_fee',
    //             'pre_dues' => 'pre_dues',
    //             'id_card' => 'id_card',
    //             'board_fee' => 'board_fee',
    //             'stationary' => 'stationary'
    //         ];

    //         foreach ($fee_mapping as $formKey => $dbColumn) {
    //             $classvoucher->{$dbColumn} = isset($fees[$formKey]) ? $fees[$formKey] : 0;
    //         }

    //         $classvoucher->save();
    //     }

    //     return redirect()->back()->with('success', 'Class fee vouchers created successfully!');
    // }
    public function store_class_voucher(Request $request)
    {
        // Extract class and section from request
        $selectedClass = $request->input('class');
        $selectedSection = $request->input('section');
        $monthYear = $request->input('month_year');

        // Fetch students based on class and section
        $students = Admissionform::where('current_class', $selectedClass)
            ->where('section', $selectedSection)
            ->whereNotIn('Status', ['Pass Out', 'Left Out'])
            ->get();

        foreach ($students as $student) {
            // Check if a voucher already exists for this student in the same month and year
            $existingVoucher = ClassFeeVoucher::where('gr_number', $student->gr_number)
                ->where('month_year', $monthYear)
                ->first();

            if ($existingVoucher) {
                // Update the existing voucher
                $classvoucher = $existingVoucher;
            } else {
                // Create a new voucher
                $classvoucher = new ClassFeeVoucher();
                $classvoucher->gr_number = $student->gr_number; // Fetching from Admissionform
            }

            $classvoucher->transaction_date = now(); // Or use a specific date
            $classvoucher->issued_date = now(); // Or use a specific date
            $classvoucher->due_date = $request->input('due_date');
            $classvoucher->session = $request->input('session');
            $classvoucher->note_01 = $request->input('note_01');
            $classvoucher->note_02 = $request->input('note_02');
            $classvoucher->month_year = $monthYear;
            $classvoucher->class = $selectedClass;
            $classvoucher->section = $selectedSection;

            $fees = $request->input('fees', []);
            $fee_mapping = [
                'admission' => 'admission',
                'tution' => 'tution',
                'annual' => 'annual',
                'exam_fee' => 'exam_fee',
                'lab_charges' => 'lab_charges',
                'late_fee' => 'late_fee',
                'pre_dues' => 'pre_dues',
                'id_card' => 'id_card',
                'board_fee' => 'board_fee',
                'stationary' => 'stationary',
            ];

            $total = 0;

            foreach ($fee_mapping as $formKey => $dbColumn) {
                $classvoucher->{$dbColumn} = isset($fees[$formKey]) ? $fees[$formKey] : 0;
                $total += $classvoucher->{$dbColumn};
            }

            // Subtract late_fee from total
            $total -= $classvoucher->late_fee;
            // $total -= $fees["late_fee"];

            $classvoucher->total = $total;

            $classvoucher->save();
        }

        return redirect()->back()->with('success', 'Class fee vouchers created successfully!');
    }

    public function getFeesForClass($class)
    {
        $fees = Fees::where('class', $class)->first();
        return response()->json($fees);
    }

    public function store(Request $request) {}

    public function generatePDF() {}

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
