<?php


namespace App\Http\Controllers\Auth;


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    //
//     public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');
//     $loginType = $request->input('login_type');

//     if ($loginType === 'user') {
//         $user = User::where('email', $credentials['email'])->first();

//         if ($user && Hash::check($credentials['password'], $user->password)) {
//             // User logged in successfully
//             session(['user_id' => $user->id]);
//             return redirect()->route('employee.index')
//                 ->with('success', 'Logged in successfully and redirected to employee page.');
//         } else {
//             // User login failed
//             return back()->withErrors(['email' => 'Invalid credentials']);
//         }
//     } elseif ($loginType === 'employee') {
//         $employee = employee::where('email', $credentials['email'])->first();

//         if ($employee && Hash::check($credentials['password'], $employee->password)) {
//             // Employee logged in successfully
//             session(['employee_id' => $employee->id]);
//             return redirect()->intended('/leave_requests/create');
//         } else {
//             // Employee login failed
//             return back()->withErrors(['email' => 'Invalid credentials']);
//         }
//     }

//     // Handle other cases or errors here
// }


    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $loginType = $request->input('login_type');

    if ($loginType === 'user') {
        if (Auth::attempt($credentials)) {
            // User logged in successfully
            return redirect()->route('employee.index')
            ->with('success', 'Logged in successfully and redirected to employee page.');
        } else {
            // User login failed
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    } elseif ($loginType === 'employee') {
        if (Auth::guard('employee')->attempt($credentials)) {
            // Employee logged in successfully
            return redirect()->intended('/leave_requests/create');
        } else {
            // Employee login failed
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    // Handle other cases or errors here
}


    public function create()
    {
        if (auth()->guard('employee')->check()) {
            return view('auth.login');
        } else {
            return view('auth.login');
        }
    }

    public function store(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);

    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    $userResult = Auth::attempt($credentials, $request->boolean('remember'), 'user');
    $employeeResult = Auth::attempt($credentials, $request->boolean('remember'), 'employee');

    if ($userResult) {
        return redirect()->intended('/');
    } elseif ($employeeResult) {
        return redirect()->intended('/employee'); // Change to the employee dashboard route
    }

    return back()->withInput()->withErrors([
        'email' => 'Invalid credentials'
    ]);
}

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email'=>'required',
    //         'password'=>'required'

    //     ]);

    //     $credinatils=[
    //         'email'=>$request->email,
    //         'password'=>$request->password,
    //         // 'status'=>'active',
    //     ];
    //     // طريقة اخرى
    //     // تحقق و
    //     //login
    //     $result=Auth::attempt($credinatils,
    //         $request->boolean('remember')
    //     );

    //     // $user=User::where('email','=',$request->email)->first();
    //    // كيف بدي اتاكد انه اليوزر authanicated
    //         // بقارن القيمة الموجودة في الداتا بيس مع القيمة الي بدخلها اليوزر

    //     // if($user && Hash::check($request->password,$user->password)){
    //               // بتحقق من الايميل وبعدها الباسورد
    //       //plain (password)=== hash(from user )

    //     //     Auth::login($user,$request->boolean('remember'));
    //         // بمرر الها
    //         // userobject and store in session to know the authanctited user

    //         if($result){
    //                      return redirect()->intended('/');
    //                      // بمعنى اليوزر  طلب هاي الصفحة قبل م يعمل login
    //                      // لذلك بعد م يعمل  login
    //                     //  لازم يتم توجيه لهاي الصفحة

    //         }

    //         //if not authactited return to login page with same inputs
    //         return back()->withInput()->withErrors([
    //             'email'=>'invalid cardentals'
    //             // اذا دخل اشي غلط بدي يحتفظلي القيم الي دخلها اليوزر
    //         ]);

    //     }

    }


