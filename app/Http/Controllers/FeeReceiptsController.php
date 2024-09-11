<?php

namespace App\Http\Controllers;

use App\Models\Admissionform;
use App\Models\ClassFeeVoucher;
use App\Models\contactfom;
use App\Models\FeeReceipt;
use Illuminate\Http\Request;

class FeeReceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    public function showFeeReceipts()
    {
        $notificationCount = contactfom::where('is_new', true)->count();
        $contacts = contactfom::all();
        $feeReceipts = FeeReceipt::all();
        return view("admin.fee_receipts_show", compact('notificationCount', 'contacts', 'feeReceipts'));
    }

    public function createFeeReceipts(Request $request)
    {
        $gr_number = $request->gr_number;
        if ($gr_number != null) {
            $latestFeeVoucher = ClassFeeVoucher::where('gr_number', $gr_number)->latest('created_at')->first();
            if ($latestFeeVoucher) {
                // Fetch discount from Admissionform model using GR number
                $student = Admissionform::where('gr_number', $gr_number)->first();
                $discount = $student ? $student->discount : 0;
                $predues = $student->predues;

                $feeReceipt = new FeeReceipt();
                $feeReceipt->voucher_id = $latestFeeVoucher->id;
                $feeReceipt->date = $latestFeeVoucher->due_date;
                $feeReceipt->gr_number = $latestFeeVoucher->gr_number;
                $feeReceipt->class = $latestFeeVoucher->class;
                $feeReceipt->section = $latestFeeVoucher->section;
                $feeReceipt->total = $latestFeeVoucher->total;
                $feeReceipt->paytype = "";
                $feeReceipt->discount = $discount;
                $feeReceipt->receipts = $latestFeeVoucher->total;
                $feeReceipt->balance = $predues;
                $feeReceipt->save();
                return response()->json($feeReceipt);
            } else {
                return response()->json(['message' => 'No fee voucher found for the given GR number.']);
            }
        }
    }

    public function showSearchedFeeReceipts(string $search = null)
    {

        $feeReceipts = null;

        if ($search) {
            $feeReceipts = FeeReceipt::where('gr_number', 'LIKE', '%' . $search . '%')->get();
        } else {
            $feeReceipts = FeeReceipt::all();
        }

        // Add student names to fee receipts
        $feeReceipts->each(function ($feeReceipt) {
            $student = Admissionform::where('gr_number', $feeReceipt->gr_number)->first();
            $feeReceipt->student_name = $student ? $student->student_name : 'Unknown';
        });

        return response()->json($feeReceipts);
    }

    // public function showFilteredFeeReceipts(Request $request)
    // {
    //     $request->validate([
    //         'filterData' => 'required|string',
    //     ]);

    //     // Default to all receipts if no filter is applied
    //     $feeReceiptsQuery = FeeReceipt::query();

    //     // Filter by today's date
    //     if ($request->has('filterData') && $request->filterData == 'today') {
    //         $today = \Carbon\Carbon::today()->toDateString();
    //         $feeReceiptsQuery->whereDate('created_at', $today);
    //     }
    //     dd(feeReceiptsQuery);
    //     // Filter by the current month
    //     if ($request->has('filterData') && $request->filterData == 'monthly') {
    //         $startOfMonth = \Carbon\Carbon::now()->startOfMonth()->toDateString();
    //         $endOfMonth = \Carbon\Carbon::now()->endOfMonth()->toDateString();
    //         $feeReceiptsQuery->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
    //     }

    //     // Get filtered receipts
    //     $feeReceipts = $feeReceiptsQuery->get();

    //     $feeReceipt = FeeReceipt::where('id', $request->id)->first();
    //     if ($feeReceipt) {
    //         $feeReceipt->paytype = $request->paytype;
    //         $feeReceipt->save();

    //         return response()->json(['feeReceipt' => $feeReceipt]);
    //     } else {
    //         return response()->json(['message' => 'Fee receipt not found.'], 404);
    //     }
    // }

    public function showFilteredFeeReceipts(Request $request)
    {
        $request->validate([
            'filterData' => 'required|string',
        ]);

        $feeReceiptsQuery = FeeReceipt::query();

        if ($request->filterData == 'today') {
            $today = \Carbon\Carbon::today()->toDateString();
            $feeReceiptsQuery->whereDate('created_at', $today);
        } elseif ($request->filterData == 'monthly') {
            $startOfMonth = \Carbon\Carbon::now()->startOfMonth()->toDateString();
            $endOfMonth = \Carbon\Carbon::now()->endOfMonth()->toDateString();
            $feeReceiptsQuery->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        } elseif ($request->filterData == 'all') {
            $feeReceiptsQuery = FeeReceipt::query();
        }

        $feeReceipts = $feeReceiptsQuery->get();
        // Add student names to fee receipts
        $feeReceipts->each(function ($feeReceipt) {
            $student = Admissionform::where('gr_number', $feeReceipt->gr_number)->first();
            $feeReceipt->student_name = $student ? $student->student_name : 'Unknown';
        });


        return response()->json($feeReceipts);
    }


    public function updatePayTypeFeeReceipts(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:fee_receipts,id',
            'paytype' => 'required|string',
        ]);

        $feeReceipt = FeeReceipt::where('id', $request->id)->first();
        if ($feeReceipt) {
            $feeReceipt->paytype = $request->paytype;
            $feeReceipt->save();

            return response()->json(['feeReceipt' => $feeReceipt]);
        } else {
            return response()->json(['message' => 'Fee receipt not found.'], 404);
        }
    }

    public function updateDiscountFeeReceipts(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:fee_receipts,id',
            'discount' => 'required|numeric|min:0',
        ]);

        $feeReceipt = FeeReceipt::where('id', $request->id)->first();
        if ($feeReceipt) {
            $feeReceipt->discount = $request->discount;
            $feeReceipt->save();

            // Update the discount in the Admissionform based on the gr_number
            $student = Admissionform::where('gr_number', $feeReceipt->gr_number)->first();
            if ($student) {
                $student->discount = $request->discount;
                $student->save();
            }

            return response()->json(['feeReceipt' => $feeReceipt]);
        } else {
            return response()->json(['message' => 'Fee receipt not found.'], 404);
        }
    }

    public function updateReceiptsFeeReceipts(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:fee_receipts,id',
            'receipts' => 'required|numeric|min:0',
        ]);

        $feeReceipt = FeeReceipt::where('id', $request->id)->first();
        if ($feeReceipt) {
            // Update the receipts in the FeeReceipt
            $feeReceipt->receipts = $request->receipts;

            // Calculate the balance (total - receipts)
            $balance = $feeReceipt->total - $request->receipts;
            $feeReceipt->balance = $balance;

            $feeReceipt->save();

            // Update the balance in the Admissionform based on the gr_number
            $student = Admissionform::where('gr_number', $feeReceipt->gr_number)->first();
            if ($student) {
                $student->predues = $balance;
                $student->save();
            }

            return response()->json(['feeReceipt' => $feeReceipt, 'balance' => $student->predues]);
        } else {
            return response()->json(['message' => 'Fee receipt not found.'], 404);
        }
    }

    public function updateBalanceFeeReceipts(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:fee_receipts,id',
            'balance' => 'required|numeric|min:0',
        ]);

        $feeReceipt = FeeReceipt::where('id', $request->id)->first();
        if ($feeReceipt) {
            $feeReceipt->balance = $request->balance;
            $feeReceipt->save();

            // Update the balance in the Admissionform based on the gr_number
            $student = Admissionform::where('gr_number', $feeReceipt->gr_number)->first();
            if ($student) {
                $student->predues = $request->balance;
                $student->save();
            }

            return response()->json(['feeReceipt' => $feeReceipt]);
        } else {
            return response()->json(['message' => 'Fee receipt not found.'], 404);
        }
    }

    public function deleteFeeReceipts($id)
    {
        $feeReceipt = FeeReceipt::findOrFail($id);
        $feeReceipt->delete();

        return response()->json(['feeReceipt' => $feeReceipt]);
    }
}
