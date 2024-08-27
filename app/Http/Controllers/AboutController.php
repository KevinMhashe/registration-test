<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AboutController extends Controller
{
    public function index()
    {
        // Fetch the data from the backend API
        $response = Http::get(env('BACKEND_API_URL') . "/about");

        $about = $response->json();

        return view('about.index', compact('about'));
    }
}
