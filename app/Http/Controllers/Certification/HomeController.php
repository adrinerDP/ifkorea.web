<?php

namespace App\Http\Controllers\Certification;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function __construct()
    {
        $this->middleware('logged.in');
    }

    public function index()
    {
        return view('certification.home');
    }
}
