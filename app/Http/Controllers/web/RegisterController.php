<?php

namespace App\Http\Controllers\web;

use App\Actions\StoreUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthValidationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index()
    {
        return view('register');
    }

    public function store(RegisterRequest $request, StoreUserAction $userAction)
    {
        $user = $userAction->create($request->validated());
        Auth::login($user);
        toastr()->success('You have successfully register');
        return redirect()->route('dashboard');
    }


}
