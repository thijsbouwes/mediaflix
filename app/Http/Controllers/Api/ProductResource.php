<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ProductResource extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        $products = Product::paginate();

        return new JsonResponse($products);
    }

    /**
     * Display the specified resource.
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        return new JsonResponse($product);
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $createRequest
     * @return JsonResponse
     */
    public function store(ProductRequest $createRequest)
    {
        $product = Product::create(
            $createRequest->all()
        );

        return new JsonResponse($product, Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage
     * @param Product $product
     * @param ProductRequest $updateRequest
     * @return JsonResponse
     */
    public function update(Product $product, ProductRequest $updateRequest)
    {
        $product->update(
            $updateRequest->all()
        );

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
