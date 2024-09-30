@extends('layouts.app')

@section('title', $company->name)

@section('content')
<div class="container">
    <h1>{{ $company->name }}</h1>
    <p>Email: {{ $company->email }}</p>
    <p>Website: <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
    @if($company->logo)
        <img src="{{ asset('storage/' . $company->logo) }}" width="100" height="100" alt="Logo">
    @endif

    <h2>Employees</h2>
    <a href="{{ route('employees.create', ['company_id' => $company->id]) }}" class="btn btn-primary mb-3">Add New Employee</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
