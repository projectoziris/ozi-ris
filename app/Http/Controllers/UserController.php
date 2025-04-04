<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
use App\Models\User; // ✅ Guna model betul
=======
use App\Models\User;
>>>>>>> Stashed changes
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
<<<<<<< Updated upstream
            'name'     => 'required|string|max:255',
=======
            'name'     => 'required',
>>>>>>> Stashed changes
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'role'     => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

<<<<<<< Updated upstream
        return redirect()->route('users.index')->with('success', 'Pengguna ditambah.');
=======
        return redirect()->route('users.index')->with('success', 'Pengguna berjaya ditambah.');
>>>>>>> Stashed changes
    }

    public function edit(User $user)
    {
        $roles = Role::all();
<<<<<<< Updated upstream
        return view('users.edit', compact('user', 'roles'));
=======
        $userRole = $user->roles->pluck('name')->first(); // satu role sahaja
        return view('users.edit', compact('user', 'roles', 'userRole'));
>>>>>>> Stashed changes
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
<<<<<<< Updated upstream
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
            'role'     => 'required|exists:roles,name',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'Pengguna dikemaskini.');
=======
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|exists:roles,name',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'Pengguna berjaya dikemaskini.');
>>>>>>> Stashed changes
    }

    public function destroy(User $user)
    {
        $user->delete();
<<<<<<< Updated upstream
        return redirect()->route('users.index')->with('success', 'Pengguna dipadam.');
=======
        return redirect()->route('users.index')->with('success', 'Pengguna berjaya dipadam.');
>>>>>>> Stashed changes
    }
}
