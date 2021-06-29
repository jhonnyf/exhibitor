<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('console.login.index');
    }

    public function auth(UserAuthRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']), true) === false) {
            return redirect()->route('login.index');
        }

        return redirect()->route('dashboard.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
