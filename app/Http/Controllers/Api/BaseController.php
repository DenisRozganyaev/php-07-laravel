<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * @param string $ability
     * @return \Illuminate\Http\JsonResponse|void
     */
    protected function checkAbility(string $ability)
    {
        if (!auth()->user()->tokenCan($ability)) {
            return response()->json([
                'status' => 'error',
                'data' => [
                    'message' => "You're not allowed to this endpoint"
                ]
            ], 403);
        }
    }
}
