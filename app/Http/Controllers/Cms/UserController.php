<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:30",
            "username" => "required|string|max:30",
            "role" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|confirmed"
        ]);

        if($validator->fails()){
            $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()
                    ->back()
                    ->withInput($request->all())
                    ->withErrors($validator);
        }
        
        dd("Hasil", $request->all());
    }
}
