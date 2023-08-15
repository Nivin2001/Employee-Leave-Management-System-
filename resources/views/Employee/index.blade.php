@extends('Dashborad.dashborad')
@section('content')

<div class="col-md-12 text-center">
    <h1 class="text-primary font-weight-bold" style="margin: 30px">Employee</h1>
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
                <th class="text-dark font-weight-bold" scope="col">#</th>
                <th class="text-dark font-weight-bold">Name</th>
                <th class="text-dark font-weight-bold">Email</th>
                <th class="text-dark font-weight-bold">Address</th>
                <th class="text-dark font-weight-bold">Career</th>

                <th class="text-center text-dark font-weight-bold">Icon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $employees as $index => $employees)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $employees->name }}</td>
                <td>{{ $employees->email }}</td>
                <td>{{ $employees->address }}</td>
                <td>{{ $employees->career }}</td>

                <td class="d-flex justify-content-between">

                    <a href="{{ route('employee.edit', $employees->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil"></i> Edit
                    </a>

                    <form action="{{route('employee.destroy',$employees->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">
                         <i class="bi bi-trash"></i> Delete
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
