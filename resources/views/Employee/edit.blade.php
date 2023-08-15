@extends('Dashborad.dashborad')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="text-primary font-weight-bold" style="margin: 30px">Upadte employee</h1>
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

             <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="name" name="name" placeholder="Enter name" value="{{ $employee->name}}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                    id="email" name="email" placeholder="Enter Email" value="{{ $employee->email}}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                    id="address" name="address" placeholder="Enter Address" value="{{ $employee->address}}">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Description">Career:</label>
                    <input type="text" class="form-control @error('career') is-invalid @enderror"
                    id="career" name="career" placeholder="Enter Career" value="{{ $employee->career}}">
                    @error('career')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">update employee</button>
            </form>
        </div>
    </div>
</div>
@endsection
