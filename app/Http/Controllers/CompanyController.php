<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Display the list of companies (with pagination)
    public function index()
    {
        $companies = Company::paginate(10); // Paginate 10 companies per page
        return view('companies.index', compact('companies')); // Pass companies to the view
    }

    // Show form to create a new company
    public function create()
    {
        return view('companies.create'); // Return create form view
    }

    // Save the new company to the database
    public function store(CompanyRequest $request)
    {
        $data = $request->validated();

        // Handle file upload for company logo
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Create a new company
        Company::create($data);

        // Redirect to the list of companies with a success message
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    // Show form to edit an existing company
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company')); // Return edit form view with company data
    }

    // Update the company in the database
    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->validated();

        // Handle logo update if a new one is uploaded
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Update the company
        $company->update($data);

        // Redirect back to the list with a success message
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    // Delete the company from the database
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }

    // Show company details along with its employees
    public function show(Company $company)
    {
        $employees = $company->employees; 
        return view('companies.show', compact('company', 'employees'));
    }
}
