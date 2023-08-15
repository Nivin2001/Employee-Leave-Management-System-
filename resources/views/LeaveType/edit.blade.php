@extends('Dashborad.dashborad')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">

            <h1 class="text-primary font-weight-bold" style="margin: 30px">Edit Leave Type</h1>
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


            <form method="POST" action="{{ route('leave-types.update', $leaveType->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                     name="name" placeholder="Enter name" value="{{ $leaveType->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Description">Description:</label>
                    <input type="text" class="form-control @error('Description') is-invalid @enderror" id="Description" name="Description" placeholder="Enter Description" value="{{ $leaveType->description}}">
                    @error('Description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" style="margin: 10px">Edit Leave Types</button>
            </form>
        </div>
    </div>
</div>
@endsection
