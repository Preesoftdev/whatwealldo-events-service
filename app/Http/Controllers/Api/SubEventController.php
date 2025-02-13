<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubEvent\UpdateSubEventRequest;
use App\Http\Resources\SubEventResource;
use App\Models\Event;
use App\Models\SubEvent;
use App\Traits\ResponseMethodTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubEventController extends Controller
{
    /**
     * Get all sub-events for a specific event.
     */
    use ResponseMethodTrait;
    public function index(Event $event)
    {
        $event = Event::with('subEvents')->findOrFail($event->id);

        if ($event->subEvents->isEmpty()) {
            return $this->sendResponse([], 'No sub Event Found for This Event.');
        }

        return $this->sendResponse(SubEventResource::collection($event->subEvents), 'Sub Event Retrieved Successfully');
    }




    public function store(Request $request, Event $event)
    {


        // Check if multiple sub-events are being sent
        $subEvents = is_array($request->sub_events) ? $request->sub_events : [$request->all()];

        $createdSubEvents = [];

        DB::transaction(function () use ($event, $subEvents, &$createdSubEvents) {
            foreach ($subEvents as $subEventData) {
                $subEvent = SubEvent::create([
                    'event_id' => $event->id,
                    'sub_event_name' => $subEventData['sub_event_name'],
                    'date' => $subEventData['date'],
                    'start_time' => $subEventData['start_time'],
                    'finish_time' => $subEventData['finish_time'],
                    'dress_code' => $subEventData['dress_code'] ?? null,
                    'color_theme' => $subEventData['color_theme'] ?? null,
                    'location' => $subEventData['location'] ?? null,
                    'description' => $subEventData['description'] ?? null,
                    'note' => $subEventData['note'] ?? null,
                ]);

                $createdSubEvents[] = new SubEventResource($subEvent);
            }
        });

        return $this->sendResponse($createdSubEvents, 'Sub Event Created Successfully');
    }

    public function update(UpdateSubEventRequest $request,Event $event)
    {
        $updatedSubEvents = [];

        foreach ($request->sub_events as $subEventData) {
            $subEvent = SubEvent::findOrFail($subEventData['id']);
            $subEvent->update($subEventData);
            $updatedSubEvents[] = new SubEventResource($subEvent);
        }


        return $this->sendResponse($updatedSubEvents, 'Sub Event Created Successfully');
    }

    /**
     * Delete a sub-event.
     */
    public function destroy(Event $event,SubEvent $subEvent)
    {

        $subEvent->delete();

        return $this->sendResponse([], 'Sub Event deleted Successfully');
    }
}
