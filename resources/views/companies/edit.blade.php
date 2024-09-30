@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')
<div class="container">
<h1>Edit Company</h1>

<form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Company Name</label>
        <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $company->email }}">
    </div>

    <div class="form-group">
        <label for="website">Website</label>
        <input type="url" name="website" class="form-control" value="{{ $company->website }}">
    </div>

    <div class="form-group">
        <label for="logo">Company Logo (min: 100x100)</label>
        <input type="file" name="logo" class="form-control">
        <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/logos/_fallback.png') }}" width="100" height="100" alt="Current Logo">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
</div>
