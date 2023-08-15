<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        //
        $employees=employee::orderBy('created_at','DESC')->get();
        return view('Employee.index',compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        //
        $validate=$request->validate([
            'name' => 'required|string',
            'email' => 'string',
            'addrees' => 'nullable|string',
            'career' => 'nullable|string',

        ]);

        employee::create($request->all());
    return redirect()->route('employee.index')
    ->with('success','employee added successfully')
    ;

    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        //
        return view ('Employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employee $employee)
    {
        //
        $employee->update($request->all());
        return redirect()->route('employee.index')
        ->with('success','employee updated successfully')
        ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employee)
    {
        //

        $employee->delete();
        return redirect()->route('employee.index')
        ->with('success','employee deleted  successfully')
        ;
    }
}
