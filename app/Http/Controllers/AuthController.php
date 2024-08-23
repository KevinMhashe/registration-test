<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

public function showRegisterForm()
{
    return view('auth.register');
}
public function showLoginForm()
{
    return view('auth.login');
}

public function register(Request $request)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://apilihpikihna.org/api/register",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => http_build_query($request->all()),
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return redirect()->back()->withErrors(['error' => "cURL Error #: " . $err]);
    } else {
        $data = json_decode($response, true);
        if (isset($data['token'])) {
            session(['token' => $data['token']]);
            return redirect()->route('home')->with('success', 'Registration successful!');
        }
        return redirect()->back()->withErrors($data);
    }
}


}
