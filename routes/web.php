<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveRequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'leave-types' => LeaveTypeController::class,
    'employee' => EmployeeController::class,
    'leave_requests' => LeaveRequestController::class ,

]);


// routes/web.php

Route::get('/leave-requests/approve/{id}', 'LeaveRequestController@approve')->name('leave-requests.approve');

// routes/web.php

Route::get('/leave-requests/reject/{id}', 'LeaveRequestController@reject')->name('leave-requests.reject');




