@extends('Dashborad.dashborad')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="text-primary font-weight-bold" style="margin: 30px">Create New Leave Type</h1>
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

            <form style="margin-top: 20px;" action="{{ route('leave-types.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Description">Description:</label>
                    <input type="text" class="form-control @error('Description') is-invalid @enderror" id="Description" name="Description" placeholder="Enter Description" value="{{ old('Description') }}">
                    @error('Description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Leave Types</button>
            </form>
        </div>
    </div>
</div>
@endsection
