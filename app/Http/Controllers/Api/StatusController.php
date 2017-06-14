<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class StatusController extends Controller
{
    public function __invoke()
    {
        return new JsonResponse(['status' => Response::HTTP_OK, 'message' => 'Up and running']);
    }
}
