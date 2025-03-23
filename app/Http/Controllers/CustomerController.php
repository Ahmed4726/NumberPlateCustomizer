<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('is_admin', '!=', 1);

        // Apply filters
        if (!empty($request->name)) {
            $query->where('name', 'like', "%{$request->name}%");
        }
        if (!empty($request->email)) {
            $query->where('email', 'like', "%{$request->email}%");
        }
        if (!empty($request->phone_number)) {
            $query->where('phone_number', 'like', "%{$request->phone_number}%");
        }
        if (!empty($request->city)) {
            $query->where('city', 'like', "%{$request->city}%");
        }

        $customers = $query->paginate(5);

        if ($request->ajax()) {
            return response()->json([
                'customers' => view('customers.index', compact('customers'))->render()
            ]);
        }

        return view('customers.index', compact('customers'));
    }



}
