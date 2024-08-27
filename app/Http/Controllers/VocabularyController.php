<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VocabularyController extends Controller
{
    public function index()
    {
        return view('vocabulary.index');
    }

    public function search(Request $request)
    {
        $response = Http::post(env('BACKEND_API_URL') . '/vocabulary', [
            'word' => $request->input('word'),
            'option' => $request->input('option'),
        ]);

        $result = $response->json();

        return view('vocabulary.index', [
            'translatedWord' => $result['data'] ?? null,
            'errorMsg' => $result['error'] ?? null,
            'word' => $request->input('word'),
            'option' => $request->input('option'),
        ]);
    }
}
