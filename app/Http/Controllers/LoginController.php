<?php

namespace App\Http\Controllers;

use App\Services\AuthenticationService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $authService;
    
    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $valid = $this->authService->verifyUser($request);
        
        if (!$valid) {
            return redirect()->route('login')->with('message', 'Username or password invalid');
        }

        return redirect()->route('main');
    }

    public function logout(Request $request)
    {
        $request->session()->pull('logged_in');

        return redirect()->route('login');
    }
}
