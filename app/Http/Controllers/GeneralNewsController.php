<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeneralNewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 5);

        // Fetch the data from the backend API
        $response = Http::get(env('BACKEND_API_URL') . "/general-news", [
            'page' => $page,
            'limit' => $limit,
        ]);

        $gks = $response->json();

        // Pass the authentication status to the view
        $isAuthenticated = auth()->check();

        return view('general-news.index', compact('gks', 'page', 'limit', 'isAuthenticated'));
    }


    // Load more data for "Load More" functionality
    public function loadMore(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 5);

        $response = Http::get(env('BACKEND_API_URL') . "/general-news", [
            'page' => $page,
            'limit' => $limit,
        ]);

        $gks = $response->json();

        return view('general-news.partials._news', compact('gks'));
    }
}
