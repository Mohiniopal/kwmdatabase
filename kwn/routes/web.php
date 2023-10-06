<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\test_controller;
use App\Http\Controllers\test2_controller;

use App\Http\Controllers\kwm_accounts_controller;
use App\Http\Controllers\kwm_admin_controller;
use App\Http\Controllers\kwm_bg_career_controller;
use App\Http\Controllers\kwm_bg_finance_controller;
use App\Http\Controllers\kwm_bg_home_controller;
use App\Http\Controllers\kwm_bg_images_controller;
use App\Http\Controllers\kwm_bg_legal_controller;
use App\Http\Controllers\kwm_bg_services_controller;
use App\Http\Controllers\kwm_block_cal_controller;
use App\Http\Controllers\kwm_career_controller;
use App\Http\Controllers\kwm_chooseus_controller;
use App\Http\Controllers\kwm_color_controller;
use App\Http\Controllers\kwm_contactus_controller;
use App\Http\Controllers\kwm_creditor_controller;
use App\Http\Controllers\kwm_customer_controller;
use App\Http\Controllers\kwm_expenses_controller;
use App\Http\Controllers\kwm_finance_app_controller;
use App\Http\Controllers\kwm_finance_docs_controller;
use App\Http\Controllers\kwm_finance_msgs_controller;
use App\Http\Controllers\kwm_fs_reg_controller;
use App\Http\Controllers\kwm_invoice_controller;
use App\Http\Controllers\kwm_invoice_parts_controller;
use App\Http\Controllers\kwm_jobcard_controller;
use App\Http\Controllers\kwm_jobcard_part_controller;
use App\Http\Controllers\kwm_job_clock_controller;
use App\Http\Controllers\kwm_payments_controller;
use App\Http\Controllers\kwm_photo_controller;
use App\Http\Controllers\kwm_quote_controller;
use App\Http\Controllers\kwm_quote_parts_controller;
use App\Http\Controllers\kwm_rep_req_controller;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\kwm_vehicle_controller;
use App\Http\Controllers\kwm_wof_book_controller;
use App\Http\Controllers\kwm_wof_sheet_controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('test', [test_controller::class, 'index']);

// Route::get('test2', [test2_controller::class, 'index']);

Route::get('kwm_account', [kwm_accounts_controller::class, 'index']);

Route::get('kwm_admin', [kwm_admin_controller::class, 'index']);

Route::get('kwm_bg_career', [kwm_bg_career_controller::class, 'index']);

Route::get('kwm_bg_finance', [kwm_bg_finance_controller::class, 'index']);

Route::get('kwm_bg_home', [kwm_bg_home_controller::class, 'index']);

Route::get('kwm_bg_image', [kwm_bg_images_controller::class, 'index']);

Route::get('kwm_bg_legal', [kwm_bg_legal_controller::class, 'index']);

Route::get('kwm_bg_service', [kwm_bg_services_controller::class, 'index']);

Route::get('kwm_block_cal', [kwm_block_cal_controller::class, 'index']);

Route::get('kwm_career', [kwm_career_controller::class, 'index']);

Route::get('kwm_chooseus', [kwm_chooseus_controller::class, 'index']);

Route::get('kwm_color', [kwm_color_controller::class, 'index']);

Route::get('kwm_contactus', [kwm_contactus_controller::class, 'index']);

Route::get('kwm_creditor', [kwm_creditor_controller::class, 'index']);

Route::get('kwm_customer', [kwm_customer_controller::class, 'index']);

Route::get('kwm_expense', [kwm_expenses_controller::class, 'index']);

Route::get('kwm_finance_app', [kwm_finance_app_controller::class, 'index']);

Route::get('kwm_finance_doc', [kwm_finance_docs_controller::class, 'index']);

Route::get('kwm_finance_msg', [kwm_finance_msgs_controller::class, 'index']);

Route::get('kwm_fs_reg', [kwm_fs_reg_controller::class, 'index']);

Route::get('kwm_invoice', [kwm_invoice_controller::class, 'index']);

Route::get('kwm_invoice_parts', [kwm_invoice_parts_controller::class, 'index']);

Route::get('kwm_jobcard', [kwm_jobcard_controller::class, 'index']);

Route::get('kwm_jobcard_part', [kwm_jobcard_part_controller::class, 'index']);

Route::get('kwm_job_clock', [kwm_job_clock_controller::class, 'index']);

Route::get('kwm_payment', [kwm_payments_controller::class, 'index']);

Route::get('kwm_photo', [kwm_photo_controller::class, 'index']);

Route::get('kwm_quote', [kwm_quote_controller::class, 'index']);

Route::get('kwm_quote_create', [kwm_quote_controller::class, 'create']);

Route::get('kwm_quote_parts', [kwm_quote_parts_controller::class, 'index']);

Route::get('kwm_rep_req', [kwm_rep_req_controller::class, 'index']);

Route::get('kwm_user', [user_controller::class, 'index']);

Route::get('kwm_user_create', [user_controller::class, 'create']);

Route::get('kwm_vehicle', [kwm_vehicle_controller::class, 'index']);

Route::get('kwm_vehicle_create', [kwm_vehicle_controller::class, 'create']);

Route::get('kwm_wof_book', [kwm_wof_book_controller::class, 'index']);

Route::get('kwm_wof_sheet', [kwm_wof_sheet_controller::class, 'index']);

// Route::get('testing', [test_controller::class, 'create']);
