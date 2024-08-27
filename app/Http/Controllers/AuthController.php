<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;

// class AuthController extends Controller
// {
//     public function showLoginForm()
//     {
//         return view('auth.login');
//     }

//     public function login(Request $request)
//     {
//         $curl = curl_init();

//         curl_setopt_array($curl, array(
//             CURLOPT_URL => "https://apilihpikihna.org/api/login",
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => "",
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 30,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => "POST",
//             CURLOPT_POSTFIELDS => http_build_query($request->all()),
//             CURLOPT_HTTPHEADER => array(
//                 "Accept: application/json"
//             ),
//         ));

//         $response = curl_exec($curl);
//         $err = curl_error($curl);

//         curl_close($curl);

//         if ($err) {
//             return redirect()->back()->withErrors(['error' => "cURL Error #: " . $err]);
//         } else {
//             $data = json_decode($response, true);
//             if (isset($data['token'])) {
//                 session(['token' => $data['token']]);

//                 // Create or update the user in your local database
//                 $user = User::updateOrCreate(
//                     ['email' => $request->email],
//                     [
//                         'name' => $request->name ?? 'Default Name', // Adjust as necessary
//                         'password' => bcrypt($request->password), // Not necessary, since API manages the password
//                     ]
//                 );

//                 // Manually log in the user
//                 Auth::login($user);

//                 return redirect()->route('dashboard')->with('success', 'Login successful!');
//             }
//             return redirect()->back()->withErrors($data);
//         }
//     }
// }
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register'); // Ensure you have this view
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Ensure you have this view
    }

    public function register(Request $request)
    {
        // Send registration data to the backend API
        $response = Http::post('https://apilihpikihna.org/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Store the token in the session or local storage
            session(['token' => $data['token']]);

            // Redirect to the dashboard or home
            return redirect()->route('dashboard')->with('success', 'Registration successful!');
        }

        return back()->withErrors($response->json()['errors']);
    }

    public function login(Request $request)
    {
        // Send login data to the backend API
        $response = Http::post('https://apilihpikihna.org/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Store the token in the session
            session(['token' => $data['token']]);

            // Redirect to the dashboard or home
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }

    public function logout()
    {
        // Clear the session data
        session()->forget('token');

        return redirect()->route('login')->with('status', 'Logged out successfully!');
    }
}
