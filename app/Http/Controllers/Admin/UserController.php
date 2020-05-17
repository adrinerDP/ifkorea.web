<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function showAllUsers()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }
}
