<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('cms.users.create');
    }
}
