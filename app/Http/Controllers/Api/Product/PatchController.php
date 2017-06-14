<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PatchController extends Controller
{
    public function __invoke(ProductRequest $patchRequest, Product $product)
    {
        $product->update(
            $patchRequest->all()
        );

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
