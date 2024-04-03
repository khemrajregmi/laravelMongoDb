<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('page_size', 10); // Default page size is 10
        $pageNumber = $request->input('page', 1); // Default page number is 1

        $filters = $request->query();

        $customers = Customer::query();

        if (isset($filters['name'])) {
            $name = $filters['name'];
            $customers->where('name', 'like', '%'. $name .'%'); // Search with wildcards
        }
        if (isset($filters['status'])) {
            $status = $filters['status'];
            $customers->where('status', '=', '%'. $status .'%'); // Search with wildcards
        }
        if (isset($filters['email'])) {
            $email = $filters['email'];
            $customers->where('email', 'like', '%'. $email .'%'); // Search with wildcards
        }

        return response()->json($customers->paginate($pageSize, ['*'], 'customers', $pageNumber));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $customer = Customer::create($validatedData);
        return response()->json(['message' => 'Customer created successfully', 'data' => $customer], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json(['data' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255', // Make name optional
            'email' => 'nullable|email|unique:customers,email,' . $customer->id, // Make email optional
            'phone' => 'nullable|string|max:20', // Already nullable
            'address' => 'nullable|string|max:255', // Already nullable
            'status' => 'nullable|in:active,inactive', // Make status optional
        ]);

        $customer->update($validatedData);
        return response()->json(['message' => 'Customer updated successfully', 'data' => $customer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
