@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="container text-center mt-4 mb-4">
                    <h1>Welcome to the Admin Panel</h1>
                    <div class="mt-4">
                        <a href="{{ route('companies.index') }}" class="btn btn-primary mb-2">Manage Companies</a>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary mb-2">Manage Employees</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
