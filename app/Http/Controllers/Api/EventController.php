<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventAttachmentRequest;
use App\Http\Requests\Event\EventRequest;
use App\Http\Requests\Event\EventSearchRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\GroupMember;
use App\Models\SavedEvent;
use App\Traits\ResponseMethodTrait;
use Carbon\Carbon;
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
    public function getEventCounts()
    {
        $today = Carbon::today();

        // Count upcoming events (future dates)
        $upcomingCount = Event::where('date', '>=', $today)->count();

        // Count completed events (past dates)
        $completedCount = Event::where('date', '<', $today)->count();
        return $this->sendResponse([
            'counts' => [
                'upcoming' => $upcomingCount,
                'completed' => $completedCount,
            ]
        ]);
    }
    public function getByLink($link)
    {
        $event = Event::where('link', $link)->first();

        if (!$event) {
            return $this->sendError('Event not found');
        }
        return $this->sendResponse(new EventResource($event));
    }
    public function PublishEvent(Request $request, Event $event){
        try {
            // If group_id is provided, assign users from the group
            if ($request->filled('group_id')) {
                $groupMembers = GroupMember::where('people_group_id', $request->group_id)->pluck('user_id');
              
                if ($groupMembers->isNotEmpty()) {
                foreach ($groupMembers as $userId) {
                    
               EventUser::updateOrCreate(
                ['event_id' => $event->id, 'user_id' => $userId] // Only search criteria, no updates
                );
                }
            }
        }
        $event->update([
         'publish' => 1
        ]);
            return $this->sendResponse(new EventResource($event), 'Event Published Successfully');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to publish event', 'error' => $e->getMessage()], 500);
        }
    
    }
    public function toggleSave(Event $event)
    {
        $user = _user();
        // Toggle save/unsave
        $saved = SavedEvent::where(['user_id' => $user->id, 'event_id' => $event->id])->first();

        if ($saved) {
            $saved->delete();
            return $this->sendResponse(null, 'Event unsaved');       
        }
        
        SavedEvent::create(['user_id' => $user->id, 'event_id' => $event->id]);
        return $this->sendResponse(null, 'Event saved');
    }
    public function uploadAttachments(EventAttachmentRequest $request,Event $event)
    {
        
        // Loop through each uploaded file
        foreach ($request->file('files') as $file) {
            $event->addMedia($file)
                  ->toMediaCollection('event_attachments');
        }

        return $this->sendResponse(new EventResource($event), 'Event attachments uploaded successfully');
    }
    public function filterEvents(Request $request)
    {
        $request->validate([
            'event_type' => 'required|string|in:personal,corporate,charity'
        ]);

        // Fetch events based on event_type
        $events = Event::where('event_type', $request->event_type)->get();

        return $this->sendResponse(EventResource::collection($events), 'Events filtered successfully');
    }
    public function searchEvents(EventSearchRequest $request)
    {
         $name = $request->input('name');
        // Search events by name (case-insensitive)
        if($name){
            $events = Event::where('name', 'LIKE', '%' . $name . '%')->get();
        }else{
            $events = Event::get();
        }
        

        return $this->sendResponse(EventResource::collection($events), 'Events searched successfully');
    }
}
