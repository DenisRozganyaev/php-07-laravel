<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;

class AuthController extends Controller
{
    public function __invoke(AuthRequest $request)
    {
        $fields = $request->validated();

        if (!auth()->attempt($fields)) {
            return response()->json([
               'status' => 'error',
               'data' => [
                   'message' => 'Invalid credentials'
               ]
            ], 422);
        }

        return response()->json([
            'token' => $request->user()->createToken($request->device_name ?? 'api')->plainTextToken
        ]);
    }
}
