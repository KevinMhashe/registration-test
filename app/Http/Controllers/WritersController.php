<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WritersController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 5);

        // Fetch the data from the backend API
        $response = Http::get(env('BACKEND_API_URL') . "/writers", [
            'page' => $page,
            'limit' => $limit,
        ]);

        $writers = $response->json();

        // Pass the authentication status to the view
        $isAuthenticated = auth()->check();

        return view('writers.index', compact('writers', 'page', 'limit', 'isAuthenticated'));
    }

    // Load more data for "Load More" functionality
    public function loadMore(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 5);

        $response = Http::get(env('BACKEND_API_URL') . "/writers", [
            'page' => $page,
            'limit' => $limit,
        ]);

        $writers = $response->json();

        // You can pass the isAuthenticated variable here too, though it might not be necessary
        $isAuthenticated = auth()->check();

        return view('writers.partials._writers', compact('writers', 'isAuthenticated'));
    }
}
