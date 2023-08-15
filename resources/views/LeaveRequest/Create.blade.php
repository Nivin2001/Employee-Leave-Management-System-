@extends('Dashborad.dashborad')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="text-primary font-weight-bold" style="margin: 30px">Apply Leave Request</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


    <form action="{{ route('leave_requests.store') }}" method="POST">
        @csrf

        <label for="employee_id">Employee</label>

        <select name="employee_id" id="employee_id">
            @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
        @endforeach
    </select><br>

        </select><br>



        <label for="leave_type_id">Leave Type</label>

        <select name="leave_type_id" id="leave_type_id">
            @foreach ($leaveTypes as $leaveType)
            <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
        @endforeach
        </select><br>

        <label for="start_date">Start date</label>
        <input type="date" name="start_date" id="start_date"><br>


        <label for="end_date">End date</label>
        <input type="date" name="end_date" id="end_date"><br>

        <button type="submit">Submit</button>
    </form>
</div>
</div>
</div>
@endsection
