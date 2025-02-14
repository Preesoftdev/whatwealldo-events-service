<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\GroupMember;
use App\Traits\ResponseMethodTrait;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use ResponseMethodTrait;
    public function index()
    {
        $user = _user();
        $events = Event::where('user_id', $user->id)->with('attendees')->get();

        return $this->sendResponse(EventResource::collection($events), 'Events Retrieved Successfully');
    }

    /**
     * Store a new event.
     */
    public function store(EventRequest $request)
    {
        $user = _user();

        $event = Event::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'event_type' => $request->event_type,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location' => $request->location,
            'people_capacity' => $request->people_capacity,
            'description' => $request->description,
        ]);

        return $this->sendResponse(new EventResource($event), 'Event Created Successfully');
    }

   
    public function update(EventRequest $request,Event $event)
    {
        
        // Ensure only the event owner can update the event
        if ($event->user_id !== _user()->id) {
            return $this->sendResponse([], 'Unauthorized: You can only update your own events.', 403);
        }

        $event->update($request->validated());

        return $this->sendResponse(new EventResource($event), 'Event Updated Successfully');
    }

    /**
     * Delete an event.
     */
    public function destroy(Event $event)
    {
       
        if ($event->user_id !== _user()->id) {
            return $this->sendResponse([], 'Unauthorized: You can only delete your own events.', 403);
        }

        $event->delete();

        return $this->sendResponse([], 'Event Deleted Successfully.');
    }
    public function addGroupUsers(Request $request, Event $event)
    {
        // Validate the request to ensure group_ids is an array
        $validated = $request->validate([
            'group_ids' => 'required|array',
            'group_ids.*' => 'exists:people_groups,id',
        ]);

        // Fetch all user IDs from the given groups
        $userIds = GroupMember::whereIn('people_group_id', $validated['group_ids'])
            ->pluck('user_id')
            ->unique()
            ->toArray();

        // Insert users into the event_user table (avoiding duplicates)
        foreach ($userIds as $userId) {
            EventUser::firstOrCreate([
                'event_id' => $event->id,
                'user_id' => $userId,
            ], [
                'status' => 'pending', // Default invitation status
            ]);
        }
        return $this->sendResponse([], 'Attendie added to the event successfully');
       
    }
}
