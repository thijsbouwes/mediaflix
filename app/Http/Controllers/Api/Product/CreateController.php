<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateController extends Controller
{
    public function __invoke(ProductRequest $createRequest)
    {
        $product = Product::create(
            $createRequest->all()
        );

        return new JsonResponse($product, Response::HTTP_CREATED);
    }
}
