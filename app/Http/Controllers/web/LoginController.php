<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthValidationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            toastr()->success('You have successfully login');
            return auth()->user()->type === 'biker' ? redirect()->route('biker.index') : redirect()->route('sender.index');
        }
        toastr()->error('Invalid credentials');
        return redirect()->route('login.index');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login.index');
    }


}
