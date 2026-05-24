<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // List users
    public function index()
    {
        $users = User::latest()->get();
        return view('control-panel.users.index', compact('users'));
    }

    // Create form
    public function create()
    {
        return view('control-panel.users.create');
    }

    // Store user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'image' => 'nullable|image'
        ]);

        $image = $request->image
            ? $request->image->store('users', 'public')
            : null;

        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $image
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    // Edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('control-panel.users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $user->image = $request->image->store('users', 'public');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function bulkDelete(Request $request)
{
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:users,id'
    ]);

    User::whereIn('id', $request->ids)->delete();

    return redirect()->route('users.index')
        ->with('success', 'Selected users deleted successfully.');
}
}