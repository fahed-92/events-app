<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
//        $staff = Staff::all();
        return view('admin.home');
    }
}
