<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserResource extends Controller
{
    /**
     * Display the specified resource.
     * @return JsonResponse
     */
    public function show() {
        $user = Auth::user();
        return new JsonResponse($user);
    }

    public function update(User $user) {
        
        $user = Auth::user();
        return new JsonResponse($user);
    }
}
