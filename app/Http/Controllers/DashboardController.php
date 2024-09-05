<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //we can leave out the request since we are not using it just sending back the view
    public function index() {
        return view('dashboard');
    }
}
