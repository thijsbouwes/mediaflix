<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class FetchController extends Controller
{
    public function __invoke(Product $product)
    {
        return new JsonResponse($product);
    }
}
