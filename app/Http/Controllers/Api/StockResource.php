<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StockRequest;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class StockResource extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Product $product
     * @return JsonResponse
     */
    public function index(Product $product)
    {
        $stocks = $product->stocks()->paginate();

        return new JsonResponse($stocks);
    }

    /**
     * Display the specified resource.
     * @param Stock $stock
     * @return JsonResponse
     */
    public function show(Stock $stock)
    {
        return new JsonResponse($stock);
    }

    /**
     * Store a newly created resource in storage.
     * @param Product $product
     * @param StockRequest $createRequest
     * @return JsonResponse
     */
    public function store(Product $product, StockRequest $createRequest)
    {
        $stock = $product->stocks()->create(
            $createRequest->all()
        );

        return new JsonResponse($stock, Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage
     * @param Stock $stock
     * @param StockRequest $updateRequest
     * @return JsonResponse
     */
    public function update(Stock $stock, StockRequest $updateRequest)
    {
        $stock->update(
            $updateRequest->all()
        );

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     * @param Stock $stock
     * @return JsonResponse
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
