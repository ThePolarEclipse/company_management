@extends('layouts.app')

@section('title', 'Add New Company')

@section('content')
<div class="container">
<h1>Add New Company</h1>

<form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Company Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label for="website">Website</label>
        <input type="url" name="website" class="form-control" value="{{ old('website') }}">
    </div>

    <div class="form-group">
        <label for="logo">Company Logo (min: 100x100)</label>
        <input type="file" name="logo" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
</div>
