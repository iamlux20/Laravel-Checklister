<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Contracts\View\View;

use App\Models\User;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::where('is_admin', 0)->latest()->paginate(50);

        return view('admin.users.index', compact('users'));
    }
}
