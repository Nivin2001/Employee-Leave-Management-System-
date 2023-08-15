<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;


class LeaveTypeController extends Controller
{
    //
    public function index(request $request )
    {

        $leaveTypes=LeaveType::orderBy('created_at','DESC')-> get();
        return view('LeaveType.index',compact('leaveTypes'));

    }
    public function create()
    {
        return view('LeaveType.create');
    }

    public function store(request $request)
    {
        $validate=$request->validate([
            'name' => 'required|string',
            'descripation' => 'nullable|string',

        ]);

    LeaveType::create($request->all());
    return redirect()->route('leave-types.index')
    ->with('success','leave type added successfully')
    ;

    }
    public function show($id)
    {
        $leaveType = LeaveType::findOrFail($id);
        $employees = $leaveType->employees;

        return view('leave_types.show', compact('leaveType', 'employees'));
    }


    public function edit(LeaveType $leaveType)
    {
        return view('LeaveType.edit', compact('leaveType'));
    }

    public function update(Request $request, LeaveType $leaveType)
    {
        $leaveType->update($request->all());
        return redirect()->route('leave-types.index')
        ->with('success','leave type updated successfully')
        ;
    }

    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();
        return redirect()->route('leave-types.index')
        ->with('success','leave type  deleted  successfully')
        ;
    }

}
