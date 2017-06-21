<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ExpenseRequest;
use App\Models\Event;
use App\Models\Expense;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ExpenseResource extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Event $event
     * @return JsonResponse
     */
    public function index(Event $event)
    {
        $expense = $event->expenses()->paginate();

        return new JsonResponse($expense);
    }

    /**
     * Display the specified resource.
     * @param Expense $expense
     * @return JsonResponse
     */
    public function show(Expense $expense)
    {
        return new JsonResponse($expense);
    }

    /**
     * Store a newly created resource in storage.
     * @param Event $event
     * @param ExpenseRequest $createRequest
     * @return JsonResponse
     */
    public function store(Event $event, ExpenseRequest $createRequest)
    {
        $expense = $event->expenses()->create(
            $createRequest->all()
        );

        return new JsonResponse($expense, Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage
     * @param Expense $expense
     * @param ExpenseRequest $updateRequest
     * @return JsonResponse
     */
    public function update(Expense $expense, ExpenseRequest $updateRequest)
    {
        $expense->update(
            $updateRequest->all()
        );

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     * @param Expense $expense
     * @return JsonResponse
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
