<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    //

    public function index(request $request)
{
    // $leaveRequests = LeaveRequest::with(['Employee', 'LeaveType'])->get();
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
  return redirect()->route('leave_requests.index')
  ->with('success', 'تم تقديم طلب الإجازة بنجاح.');

}




    public function approve(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->status = 'approved';
        $leaveRequest->approval_reason = $request->input('approval_reason');
        $leaveRequest->save();

        return redirect()->route('leave-requests.index')->with('success', 'The request was approved successfully.');
    }

    public function reject(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->status = 'rejected';
        $leaveRequest->approval_reason = $request->input('approval_reason');
        $leaveRequest->save();

        return redirect()->route('leave-requests.index')->with('error', 'reques has been rejected.');
    }
}
