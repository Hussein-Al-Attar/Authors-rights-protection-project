<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $perPage = 5; // Number of users per page

         // Initialize the query builder
         $query = User::query();

         // Check if a search query is present
         if ($request->has('query')) {
             $query->where('email', 'like', '%' . $request->input('query') . '%');
         }

         // Paginate the results
         $users = $query->paginate($perPage);

         // Append the query parameter to pagination links
         $users->appends(['query' => $request->input('query')]);

         return view('admin.index', compact('users'));
     }

    public function update(Request $request, User $user)
    {
        // Add validation rules based on your requirements
        $request->validate([
            'role' => 'required|in:user,supervise,admin',
        ]);

        // Update user information
        $user->update([
            'role' => $request->input('role'),
        ]);

        return redirect()->route('admin.index')->with('success', 'User updated successfully.');
    }

}
