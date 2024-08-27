<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function index()
    {
        // Fetch the data from the backend API
        $response = Http::get(env('BACKEND_API_URL') . "/contact");

        $contact = $response->json();

        return view('contact.index', compact('contact'));
    }
}
