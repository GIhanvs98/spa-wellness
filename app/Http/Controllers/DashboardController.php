<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Dashboard home page
    public function index()
    {
        return view('dashboard.index');
    }

    // Feedback form
    public function showFeedbackForm()
    {
        return view('feedback');
    }

   

    // User management (Admin view all users)
    public function listUsers()
    {
        $users = User::all();
        return view('dashboard.users', compact('users'));
    }

    // View user details
    public function viewUser(User $user)
    {
        return view('dashboard.viewUser', compact('user'));
    }

    // Edit user
    public function editUser(User $user)
    {
        return view('dashboard.editUser', compact('user'));
    }

    // Update user
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only(['name', 'email']));
        return redirect()->route('users')->with('success', 'User updated successfully.');
    }

    // Delete user
    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully.');
    }

    // Account settings
    public function accountSettings()
    {
        return view('dashboard.accountSettings');
    }

    // Update account settings
    public function updateAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->update($request->only(['name', 'email']));

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('accountSettings')->with('success', 'Account updated successfully.');
    }
    
}
