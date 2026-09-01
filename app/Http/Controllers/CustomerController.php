<?php

namespace App\Http\Controllers;

use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')
            ->latest()
            ->get();

        return view('customer.index', compact('customers'));
    }

    public function destroy(User $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customer.index')
            ->with('success', 'Data customer berhasil dihapus.');
    }
}