@extends('Dashborad.dashborad')
@section('content')
    <div class="container">
        <h1>My Leave Request Status</h1>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-dark font-weight-bold" >Employee</th>
                    <th class="text-dark font-weight-bold" >Leave Type</th>
                    <th class="text-dark font-weight-bold">Start Date</th>
                    <th class="text-dark font-weight-bold" >End Date</th>
                    <th class="text-dark font-weight-bold" >Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($leaveRequests as $request)
                    <tr>
                        <td>{{ $request->employee->name }}</td>
                        <td>{{ $request->leaveType->name }}</td>
                        <td>{{ $request->start_date }}</td>
                        <td>{{ $request->end_date }}</td>
                        <td>{{ $request->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
