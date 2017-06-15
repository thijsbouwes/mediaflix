<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class EventResource extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        $events = Event::paginate();

        return new JsonResponse($events);
    }

    /**
     * Display the specified resource.
     * @param Event $event
     * @return JsonResponse
     */
    public function show(Event $event)
    {
        return new JsonResponse($event);
    }

    /**
     * Store a newly created resource in storage.
     * @param EventRequest $createRequest
     * @return JsonResponse
     */
    public function store(EventRequest $createRequest)
    {
        $event = Event::create(
            $createRequest->all()
        );

        return new JsonResponse($event, Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage
     * @param Event $event
     * @param EventRequest $updateRequest
     * @return JsonResponse
     */
    public function update(Event $event, EventRequest $updateRequest)
    {
        $event->update(
            $updateRequest->all()
        );

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     * @param Event $event
     * @return JsonResponse
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
