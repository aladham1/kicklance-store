<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index', ['users' =>
            User::with('profile')->get()]);
    }

    public function create()
    {
        return view('dashboard.users.create', ['user' => new User()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->profile()->create([
            'country' => $request->country,
            'city' => $request->city,
            'birthdate' => $request->birthdate,
        ]);


//        UserProfile::create([
//            'user_id' => $user->id,
//            'country' => $request->country,
//            'city' => $request->city,
//            'birthdate' => $request->birthdate,
//        ]);

        return redirect()->route('users.index')
            ->with('success', 'User Added');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted');
    }
}
