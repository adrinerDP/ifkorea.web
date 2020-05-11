<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\InfiniteFlight\Live;

class ProfileController extends Controller {
    public function __construct()
    {
        $this->middleware('logged.in');
    }

    public function index(Live $live)
    {
        $details = null;

        if (!is_null(\Auth::user()->if_uuid)) {
            $details = $live->getUserDetails(\Auth::user()->if_uuid)[0];
        }

        return view('member.profile', compact('details'));
    }
}
