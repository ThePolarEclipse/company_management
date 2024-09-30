<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Display the list of employees (with pagination)
    public function index()
    {
        $employees = Employee::with('company')->paginate(10); // Include company relation
        return view('employees.index', compact('employees')); // Pass employees to the view
    }

    // Show form to create a new employee
    public function create(Request $request)
    {
        $companies = Company::all(); // Get all companies for the dropdown
        $selectedCompanyId = $request->query('company_id'); // Get the company_id from the query parameters
        return view('employees.create', compact('companies', 'selectedCompanyId')); // Return create form view
    }

    // Save the new employee to the database
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        
        // Create a new employee
        Employee::create($data);

        // Redirect to the list of employees with a success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Show form to edit an existing employee
    public function edit(Employee $employee)
    {
        $companies = Company::all(); // Get all companies for the dropdown
        return view('employees.edit', compact('employee', 'companies')); // Return edit form view with employee and company data
    }

    // Update the employee in the database
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        // Update the employee
        $employee->update($data);

        // Redirect back to the list with a success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    // Delete the employee from the database
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
