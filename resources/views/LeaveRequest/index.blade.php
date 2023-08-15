@extends('Dashborad.dashborad')
@section('content')
    <h1 class="text-primary  font-weight-bold" style="margin: 30px">Leave View List</h1>
        <!-- Table for Displaying Records -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-dark font-weight-bold" >Employee</th>
                <th class="text-dark font-weight-bold" >Leave Type</th>
                <th class="text-dark font-weight-bold">Start Date</th>
                <th class="text-dark font-weight-bold" >End Date</th>
                <th class="text-dark font-weight-bold" >Status</th>
                <th class="text-dark font-weight-bold" >Icon</th>
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
                    <td>
                        {{-- @if ($request->isApproved())
                            <span>مقبول</span>
                        @else
                            <form action="{{ route('leave-requests.approve', $request->id) }}" method="POST">
                                @csrf
                                <input type="text" name="approval_reason" placeholder="سبب الموافقة">
                                <button type="submit">موافقة</button>
                            </form>
                            <form action="{{ route('leave-requests.reject', $request->id) }}" method="POST">
                                @csrf
                                <input type="text" name="approval_reason" placeholder="سبب الرفض">
                                <button type="submit">رفض</button>
                            </form>
                        @endif --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<style>
    .table {
        width: 90%; /* Adjust the width as needed */
        margin: 40px auto;
    }

    .table th,
    .table td {
        text-align: left;
        padding: 10px;
    }

    .table th {
        background-color: #f8f9fa;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
</style>

