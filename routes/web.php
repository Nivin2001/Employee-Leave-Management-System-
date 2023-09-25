        <?php

        use App\Http\Controllers\EmployeeController;
        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\LeaveRequestController;
        use App\Http\Controllers\LeaveTypeController;
        use App\Http\Controllers\LoginController;
        use App\Http\Controllers\EmployeeLoginController;



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




    //     // Login Routes
    //     Route::middleware(['guest:web,guest:employee'])->group(function () {
    //         // User Login Routes
    //         Route::get('/login', [LoginController::class, 'create'])->name('login');
    // Route::post('/login', [LoginController::class, 'store']);


    //         // Employee Login Routes
    //         Route::get('/employee-login', [EmployeeLoginController::class, 'showLoginForm'])
    //             ->name('employee.login');
    //         Route::post('/employee-login', [EmployeeLoginController::class, 'login']);
    //     });


    //     // Dashboard Routes
    //     Route::middleware('auth:web,employee')->group(function () {
    //         Route::get('/dashboard', function () {
    //             return view('dashboard');
    //         })->name('dashboard');

    //         Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //         Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //         Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //     });

    // require __DIR__.'/auth.php';
    // // User-Only Routes

    //     Route::middleware(['auth:web'])->group(function () {
    //         Route::prefix('leave-requests')->group(function () {
    //             Route::get('/approve/{id}', [LeaveRequestController::class, 'approveLeaveRequest'])->name('leave-requests.approve');
    //             Route::get('/{id}/deny', [LeaveRequestController::class, 'deny'])->name('leave-requests.deny');

    //             // Use the 'web' guard for denying leave requests
    //             Route::post('/{id}/deny', [LeaveRequestController::class, 'deny'])->name('leave-requests.deny')->middleware('auth:web');
    //             // Apply approval_reason

    //         });

    //         Route::resources([
    //             'leave-types' => LeaveTypeController::class,
    //             // ... Other resource routes ...
    //         ]);
    //     });

    //     // Employee-Only Routes
    //         Route::middleware('auth:employee')->group(function () {
    //             Route::resources([
    //                 'employee' => EmployeeController::class,
    //                 'leave_requests' => LeaveRequestController::class,
    //             ]);
    //         });




    
        Route::get('/login',[LoginController::class,'create'])
        ->name('login')
        ->middleware('guest');


        // بدي الي يدخل عليها يكون guest
        // not athicated
        Route::post('/login',[LoginController::class,'store'])
        ->middleware('guest');

        Route::get('/dashboard', function () {
        return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        require __DIR__.'/auth.php';



        Route::middleware(['auth'])->group(function () {

        Route::prefix('leave-requests')->group(function () {
            Route::get('/approve/{id}', [LeaveRequestController::class, 'approveLeaveRequest'])->name('leave-requests.approve');
            Route::get('/{id}/deny', [LeaveRequestController::class, 'deny'])->name('leave-requests.deny');
            //make reject

            Route::post('/{id}/deny', [LeaveRequestController::class, 'deny'])->name('leave-requests.deny');
    // apply approval_reason

        });

        // Route::get('/leave-requests/{id}/status', [LeaveRequestController::class, 'showStatus'])->name('leave-requests.status');



        Route::resources([
            'leave-types' => LeaveTypeController::class,
            'employee' => EmployeeController::class,
            'leave_requests' => LeaveRequestController::class ,

            ]) ;


});



