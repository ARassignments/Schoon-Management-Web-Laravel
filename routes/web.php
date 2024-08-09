<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\Fees_Allocation;
use App\Http\Controllers\Stdpromotion;
use App\Http\Controllers\Classes_Controller;
use App\Http\Controllers\ClassFeeVoucherController;
use App\Http\Controllers\contactform;
use App\Http\Controllers\User_Controller;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeReceiptsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\Special_Fees_Generate_Controller;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','isadmin'])->group(function () {
    Route::get('/dashboard', [admin_controller::class, 'index']);
    //------------admission management------------//
    Route::get('/show-addmissionform', [admin_controller::class, 'addmissionform']);
    Route::get('/addadmissionform', [admin_controller::class, 'addform']);
    Route::post('storeaddmissionform', [admin_controller::class, 'storeaddmissionform']);
    Route::get('/edit-admissionform/{id}', [admin_controller::class, 'editaddmissionform']);
    Route::post('/update-addmissionform/{id}', [admin_controller::class, 'updateaddmissionform']);
    Route::get('/delete-addmissionform/{id}', [admin_controller::class, 'destroy']);
    Route::get('/edit-admissionform/{id}', [admin_controller::class, 'editaddmissionform']);
    Route::post('/update-addmissionform/{id}', [admin_controller::class, 'updateaddmissionform']);
    Route::get('/delete-addmissionform/{id}', [admin_controller::class, 'destroy']);
    Route::post('/update-status', [admin_controller::class, 'updateStatus']);
    Route::get('/my profile', [admin_controller::class, 'adminprofile']);
    Route::get('/logout', [admin_controller::class, 'logout']);

    //------------fees management-----------//
    // Route::get('/fee', [admin_controller::class, 'fee']);
    // Route::post('storefees', [admin_controller::class, 'storeaddmissionform']);
    // Route::get('/addfees', [admin_controller::class, 'addfees']);

    Route::get('/feeallocation', [Fees_Allocation::class, 'feeallocation']);
    Route::get('/get-stds/{class}', [Fees_Allocation::class, 'getStudents'])->name('get.std');
    Route::get('/addfeeallocation', [Fees_Allocation::class, 'addfeeallocation']);
    Route::post('storefeeallocation', [Fees_Allocation::class, 'storefeeallocation']);
    Route::get('/edit-feeallocation/{id}', [Fees_Allocation::class, 'editfeeallocation']);
    Route::post('/update-feeallocation/{id}', [Fees_Allocation::class, 'updatefeeallocation']);
    Route::get('/delete-feeallocation/{id}', [Fees_Allocation::class, 'destroyfeeallocation']);

    // Route::get('/feesclass', [Fees_Allocation::class, 'getfeeclass']);
    Route::get('/showAddFeeAllocationForm', [Fees_Allocation::class, 'showAddFeeAllocationForm']);
    Route::get('/get-students', [Stdpromotion::class, 'getStudents'])->name('get.students');
    Route::get('/Student Promotion', [Stdpromotion::class, 'studentpromotion']);
    Route::post('/promote-students', [Stdpromotion::class, 'promoteStudents'])->name('promote.students');

    // Route::post('/promote/students', [Stdpromotion::class, 'promoteStudents'])->name('promote.students');
    // Route::get('/addStudentPromotion', [admin_controller::class, 'addstudentpromotion']);
    // Route::post('storeStudentPromotion', [admin_controller::class, 'storestudentpromtion']);
    //------------class management-----------//
    Route::get('/class', [Classes_Controller::class, 'index']);
    route::post('storeclass', [Classes_Controller::class, 'storeclass']);
    Route::get('/add-class', [Classes_Controller::class, 'addclass']);
    Route::get('/editclass/{id}', [Classes_Controller::class, 'editclass']);
    Route::post('/updateClass/{id}', [Classes_Controller::class, 'updateclass']);
    Route::get('/deleteclass/{id}', [Classes_Controller::class, 'destroycalsses']);

    // Route::get('/addmissionform/{id}', [admin_controller::class, 'showaddmissionform']);
    Route::get('/showclassfees', [ClassFeeVoucherController::class, 'showvoucher'])->name('showvoucher');
    Route::get('/voucherform/{id}', [ClassFeeVoucherController::class, 'viewvoucher'])->name('voucherform');
    Route::get('/classfeesgenerate', [ClassFeeVoucherController::class, 'class_fees_generate'])->name('class_fees_generate');
    Route::post('/storeclassvoucher', [ClassFeeVoucherController::class, 'store_class_voucher'])->name('store_class_voucher');
    Route::get('/get-gr-number', [ClassFeeVoucherController::class, 'getGrNumber']);
    Route::get('/specialfeesgenerate', [Special_Fees_Generate_Controller::class, 'special_fees_generate']);
    
    // Reports
    Route::get('/students-report', [ReportsController::class, 'studentsreport']);
    Route::get('/removed-students', [ReportsController::class, 'removestudents']);
    Route::get('/notremoved-students', [ReportsController::class, 'notremovedstudents']);
    Route::get('/all-students', [ReportsController::class, 'strengthstudents']);
    Route::get('/class-students', [ReportsController::class, 'classstrength']);
    Route::get('/all-students-record', [ReportsController::class, 'allstudentsreport']);
    Route::get('/left-students-record', [ReportsController::class, 'leftstudentsreport']);
    Route::get('/pass-students-record', [ReportsController::class, 'passstudentsreport']);
    Route::get('/current-students-record', [ReportsController::class, 'currentstudentsreport']);
    Route::get('/defaulter-students', [ReportsController::class, 'defaulterstudents']);
    Route::get('/students-ledger', [ReportsController::class, 'studentsledger']);
    Route::get('/allstudents-list', [ReportsController::class, 'studentslist']);
    Route::get('/individual-students', [ReportsController::class, 'individualstudents']);
    Route::get('/receipt-details', [ReportsController::class, 'receiptdetails']);
    Route::get('/receipt-reports', [ReportsController::class, 'receiptreports']);
    
});

//---------------------fee receipts--------------------//


Route::get('/showFeeReceipts', [FeeReceiptsController::class, 'showFeeReceipts'])->name('showFeeReceipts');
Route::post('/createFeeReceipts', [FeeReceiptsController::class, 'createFeeReceipts'])->name('createFeeReceipts');
Route::get('/showSearchedFeeReceipts/{search?}', [FeeReceiptsController::class, 'showSearchedFeeReceipts'])->name('showSearchedFeeReceipts');
Route::post('/updatePayTypeFeeReceipts', [FeeReceiptsController::class, 'updatePayTypeFeeReceipts'])->name('updatePayTypeFeeReceipts');
Route::post('/updateDiscountFeeReceipts', [FeeReceiptsController::class, 'updateDiscountFeeReceipts'])->name('updateDiscountFeeReceipts');
Route::post('/updateReceiptsFeeReceipts', [FeeReceiptsController::class, 'updateReceiptsFeeReceipts'])->name('updateReceiptsFeeReceipts');
Route::post('/updateBalanceFeeReceipts', [FeeReceiptsController::class, 'updateBalanceFeeReceipts'])->name('updateBalanceFeeReceipts');
Route::get('/deleteFeeReceipts/{id}', [FeeReceiptsController::class, 'deleteFeeReceipts'])->name('deleteFeeReceipts');

//---------------------contactform--------------------//


Route::get('/ContactForm', [contactform::class, 'index']);
Route::post('/submit-form', [contactform::class, 'store'])->name('contact.store');
Route::post('/send-reply', [contactform::class, 'sendReply'])->name('send.reply');
Route::post('/clear-notification', [contactform::class, 'clearNotification'])->name('clear-notification');
Route::post('/clear-all-notifications', [contactform::class, 'clearAllNotifications'])->name('clear-all-notifications');


//------------User Managment-----------//
Route::get('/userHome', [User_Controller::class, 'index']);
Route::get('/userAbout', [User_Controller::class, 'about']);
Route::get('/ourprogram', [User_Controller::class, 'ourprograms']);
Route::get('/contactform', [User_Controller::class, 'contactForm']);
Route::get('/auth-registers', [User_Controller::class, 'register']);
Route::get('/auth-logins', [User_Controller::class, 'login']);
Route::get('/getclass/{class}', [ClassFeeVoucherController::class, 'getFeesForClass']);

require __DIR__.'/auth.php';
