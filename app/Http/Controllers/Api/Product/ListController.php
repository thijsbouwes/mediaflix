<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function __invoke()
    {
        $products = Product::paginate();

        return new JsonResponse($products);
    }
}
