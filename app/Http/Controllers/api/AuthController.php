<?php

namespace App\Http\Controllers\api;

use App\Actions\StoreUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use ApiResponseTrait;


    public function register(RegisterRequest $request, StoreUserAction $userAction): JsonResponse
    {
        try {
            $user = $userAction->create($request->validated());
            $user['token'] = $user->createToken(Str::random(40))->plainTextToken;
            return $this->apiSuccessResponse($user, 'created successfully', 201);
        } catch (\Exception $exception) {
            return $this->apiErrorResponse();
        }

    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            if (Auth::attempt($request->validated())) {
                $user['user'] = auth()->user();
                $user['token'] = auth()->user()->createToken(Str::random(40))->plainTextToken;
                return $this->apiSuccessResponse($user);
            }
            return $this->apiErrorResponse([], 'Unauthorized.');
        } catch (\Exception $exception) {
            return $this->apiErrorResponse([], 'Unauthorized.');
        }
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();
        return $this->apiSuccessResponse([], 'Successfully logout');

    }


}
