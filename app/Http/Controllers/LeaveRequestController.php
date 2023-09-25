<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\employee;
use App\Models\LeaveRequest;
use App\Models\LeaveType;



class LeaveRequestController extends Controller
{
    //

    public function index(request $request)

{
    // $leaveRequests = LeaveRequest::with('employee', 'leaveType')->get();

    $leaveRequests = LeaveRequest::all();
    //retrive all leave request records
    return view('LeaveRequest.index',compact('leaveRequests'));
}
public function create()
{
    $leaveTypes = LeaveType::all();
    $employees = employee::all();
    return view('LeaveRequest.create', compact('leaveTypes','employees'));
}


public function store(Request $request)
{
    $validatedData = $request->validate([
        'leave_type_id' => 'required',
        'employee_id' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',

    ]);

   LeaveRequest::create($request->all());

   return redirect()->route('leave_requests.create')
  ->with('success', 'The leave request has been submitted successfully.');



//   return redirect()->route('leave_requests.index')
//   ->with('success', 'The leave request has been submitted successfully.');

}



public function approveLeaveRequest($id)
{
    $leaveRequest = LeaveRequest::findOrFail($id);
    $leaveRequest->status = 'approved';
    $leaveRequest->save();

    return redirect()->back()->with('success', 'Leave request approved successfully.');
}

// public function deny(Request $request, $id)
// {
//     $leaveRequest = LeaveRequest::findOrFail($id);
//     $leaveRequest->status = 'denied';
//     $leaveRequest->approval_reason = $request->input('approval_reason');
//     $leaveRequest->save();

//     return response()->json(['message' => 'Leave request denied.']);
// }
// Example logic in a controller method

public function deny(Request $request, $id) {
    $leaveRequest = LeaveRequest::findOrFail($id);

    $leaveRequest->status = 'rejected';
    $leaveRequest->approval_reason = $request->input('approval_reason');

    $leaveRequest->save();

    return redirect()->back()->with('success', 'Leave request denied successfully.');
}





// public function show(Request $request, LeaveRequest $leaveRequest)
// {

//     return view('LeaveStatus.showStatus', ['leaveRequest' => $leaveRequest]);
// }


}

