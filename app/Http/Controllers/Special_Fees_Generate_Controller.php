<?php

namespace App\Http\Controllers;

use App\Models\Admissionform;
use App\Models\ClassFeeVoucher;
use Illuminate\Http\Request;
use App\Models\contactfom;
use App\Models\Fees;
use App\Models\SpecialFeeGenerate;

class Special_Fees_Generate_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function special_fees_generate(Request $request)
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
        return view('admin.special-fees-generate', compact(
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

    public function storeSpecialFeesVoucher(Request $request)
    {
        $monthYear = $request->input('month_year');
        $grNumber = $request->input('gr_number');

        // Fetch the specific student based on gr_number
        $student = Admissionform::where('gr_number', $grNumber)
            ->whereNotIn('Status', ['Pass Out', 'Left Out'])
            ->first();

        if ($student) {
            // Check if a voucher already exists for this student in the same month and year
            $existingVoucher = SpecialFeeGenerate::where('gr_number', $student->gr_number)
                ->where('month_year', $monthYear)
                ->first();

            if ($existingVoucher) {
                // Update the existing voucher
                $specialvoucher = $existingVoucher;
            } else {
                // Create a new voucher
                $specialvoucher = new SpecialFeeGenerate();
                $specialvoucher->gr_number = $student->gr_number; // Fetching from Admissionform
            }

            $specialvoucher->transaction_date = now(); // Or use a specific date
            $specialvoucher->issued_date = now(); // Or use a specific date
            $specialvoucher->due_date = $request->input('due_date');
            $specialvoucher->session = $request->input('session');
            $specialvoucher->note_01 = $request->input('note_01');
            $specialvoucher->note_02 = $request->input('note_02');
            $specialvoucher->month_year = $monthYear;

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
                'stationary' => 'stationary'
            ];

            $total = 0;

            foreach ($fee_mapping as $formKey => $dbColumn) {
                $specialvoucher->{$dbColumn} = isset($fees[$formKey]) ? $fees[$formKey] : 0;
                $total += $specialvoucher->{$dbColumn};
            }

            // Subtract late_fee from total
            $total -= $specialvoucher->late_fee;

            if (isset($fees['pre_dues']) && $fees['pre_dues']) {
                $total -= $specialvoucher->pre_dues;
                $specialvoucher->pre_dues = $student->predues;
                $specialvoucher->previous_dues = $student->predues;
                $total += $student->predues;
            }
            
            if (isset($fees['tution']) && $fees['tution']) {
                $total -= $specialvoucher->tution;
                $specialvoucher->tution = $student->fees;
                $total += $student->fees;
            }

            $specialvoucher->total = $total;
            $specialvoucher->total_payable_within_due_date = $total;
            $specialvoucher->total_payable_after_due_date = $total+$specialvoucher->late_fee;
            
            $specialvoucher->save();
            
            return redirect('showSpecialFees')->with('success', 'Special fee voucher created successfully for the student!');
        } else {
            return redirect('showSpecialFees')->with('error', 'Student not found or not eligible.');
        }
    }

    public function showSpecialFees()
    {
        $notificationCount = contactfom::where('is_new', true)->count();
        $contacts = contactfom::all();
        $voucher = SpecialFeeGenerate::all();
        return view('admin.show-special-fee-voucher', compact('notificationCount', 'contacts', 'voucher'));
    }

    public function viewSpecialFeesVoucher($id)
    {
        $notificationCount = contactfom::where('is_new', true)->count();
        $contacts = contactfom::all();
        $voucher = SpecialFeeGenerate::with('students_add')->where('id', $id)->firstorfail();
        return view('admin.voucher-class-fees', compact('notificationCount', 'contacts', 'voucher'));
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
