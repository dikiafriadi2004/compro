<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('users.username', 'like', '%' . $search . '%');
            }
        })->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('cms.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::orderByDesc('id')->get();

        return view('cms.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:30',
                'username' => 'required|string|max:30',
                'role' => 'required|exists:roles,id',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed'
            ]
        );

        if ($validator->fails()) {
            $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $roleName = Role::findOrFail($request->role)->name;
        $user->assignRole($roleName);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::orderByDesc('id')->get();

        return view('cms.users.edit', compact('roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:30',
                'username' => 'required|string|max:30',
                'role' => 'required|exists:roles,id',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email
            ]);

            // Sync role
            $roleName = Role::findOrFail($request->role)->name;
            $user->syncRoles([$roleName]);

            DB::commit();

            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update user: ' . $th->getMessage()]);
        }
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();

        try {
            // Hapus role yang terkait dulu (jika pakai Spatie Permission)
            $user->removeRole($user->roles->first());

            // Hapus user
            $user->delete();

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to delete user: ' . $th->getMessage()]);
        }
    }
}
