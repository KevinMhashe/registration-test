<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PartnersController extends Controller
{
    public function index()
    {
        // Fetch the data from the backend API
        $response = Http::get(env('BACKEND_API_URL') . "/partners");

        $partners = $response->json();

        return view('partners.index', compact('partners'));
    }
}
