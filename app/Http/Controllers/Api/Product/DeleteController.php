<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
