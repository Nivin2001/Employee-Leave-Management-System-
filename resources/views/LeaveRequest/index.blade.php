@extends('Dashborad.dashborad')
@section('content')
<div class="col-md-12 text-center">
    <h1 class="text-primary font-weight-bold" style="margin: 30px">Employee Leave Request</h1>
</div>

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
                <th class="text-center text-dark font-weight-bold">Icon</th>
                <th class="text-center text-dark font-weight-bold">Approval_reason</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($leaveRequests as $request)
            <tr>
                <td>{{ $request->employee ? $request->employee->name : 'N/A' }}</td>

                <td>{{ $request->leaveType->name }}</td>
                <td>{{ $request->start_date }}</td>
                <td>{{ $request->end_date }}</td>
                <td>{{ $request->status }}</td>

                <td class="d-flex justify-content-around align-items-center">
                    @if ($request->status === 'pending')
                        <div>
                            <a href="{{ route('leave-requests.approve', $request->id) }}" class="btn btn-success">Approve</a>
                        </div>
                        <div class="ml-2">
                            <a href="{{ route('leave-requests.deny', $request->id) }}" class="btn btn-danger">Deny</a>
                        </div>
                    @endif

                     @if ($request->status === 'rejected')
                        <form action="{{ route('leave-requests.deny', $request->id) }}" method="POST">
                            @csrf

                            <div class="mt-4 mb-3">
                                <label for="approval_reason" class="font-weight-bold">Reason for Denial:</label>
                                <div class="input-group">
                                    <input  type="text" name="approval_reason" class="form-control" placeholder="Enter reason" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-danger">Submit Denial Reason</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif -
                </td>



                    <td>
                        @if ($request->status === 'rejected')
                        Denial Reason: {{ $request->approval_reason }}
                    @endif


                    </td>


                    {{-- <button class="btn btn-danger" onclick="showApprovalReasonInput({{ $request->id }})">Deny</button>
                    <div id="approvalReasonInput_{{ $request->id }}" style="display: none;">
                        <input type="text" id="approval_reason_input_{{ $request->id }}" name="approval_reason_input_{{ $request->id }}" placeholder="Approval Reason">
                        <button onclick="approveRequest({{ $request->id }})">Submit</button>
                    </div>
                @endif

                    </div>




                </td>



                <script>
                    function showApprovalReasonInput(requestId) {
                        var approvalReasonInput = document.getElementById('approvalReasonInput_' + requestId);
                        approvalReasonInput.style.display = 'block';
                    }

                    function approveRequest(requestId) {
                        var reasonInput = document.getElementById('approval_reason_input_' + requestId).value;

                        $.ajax({
                            type: 'POST',
                            url: '{{ route("leave-requests.approve", ":id") }}'.replace(':id', requestId),
                            data: {
                                _token: '{{ csrf_token() }}',
                                approval_reason: reasonInput
                            },
                            success: function(response) {
                                console.log(response);
                                // Handle success response
                            },
                            error: function(error) {
                                console.log(error);
                                // Handle error response
                            }
                        });
                    } --}}


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

