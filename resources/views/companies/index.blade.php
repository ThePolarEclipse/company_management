@extends('layouts.app')

@section('title', 'Companies List')

@section('content')
<div class="container">
<h1>Companies</h1>
<a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add New Company</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Logo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td><a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a></td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->website }}</td>
            <td>
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" width="50" height="50" alt="Logo">
                @else
                    <img src="{{ asset('storage/logos/_fallback.png') }}" width="50" height="50" alt="Default Logo">
                @endif
            </td>
            <td>
                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $companies->links('pagination::bootstrap-4') }} <!-- Pagination links -->
@endsection
</div>
