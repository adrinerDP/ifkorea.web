<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ActionsController extends Controller
{
    public function showLoginForm()
    {
        $this->middleware('logged.out');
        return view('auth.login');
    }

    public function logout()
    {
        $this->middleware('logged.in');
        \Auth::logout();

        return \Redirect::home();
    }
}
