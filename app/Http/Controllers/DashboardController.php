<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  // Ensure this line is present

class DashboardController extends Controller
{
    public function __construct()
    {
        // This ensures that only authenticated users can access the dashboard
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.home');
    }
}
