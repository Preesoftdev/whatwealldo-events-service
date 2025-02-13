<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventTaskRequest;
use App\Http\Resources\EventTaskResource;
use App\Models\Event;
use App\Models\EventTask;
use App\Models\EventTaskUser;
use App\Traits\ResponseMethodTrait;
use Illuminate\Http\Request;

class EventTaskController extends Controller
{
    use ResponseMethodTrait;
    public function index($eventId)
    {
        $event = Event::with('tasks.assignedUsers')->findOrFail($eventId);

        if ($event->tasks->isEmpty()) {
            return $this->sendResponse([], 'No Tasks Found for This Event.');
        }

        return $this->sendResponse(EventTaskResource::collection($event->tasks), 'Event Tasks Retrieved Successfully');
    }

    public function store(EventTaskRequest $request,Event $event)
    {
 
     
        // Check if multiple tasks are being sent
        $tasks = is_array($request->tasks) ? $request->tasks : [$request->all()];
    
        $createdTasks = [];
    
        foreach ($tasks as $taskData) {
            $task = EventTask::create([
                'event_id' => $event->id,
                'task_name' => $taskData['task_name'],
                'sequence' => $taskData['sequence'] ?? null,
                'start_time' => $taskData['start_time'],
                'finish_time' => $taskData['finish_time'],
                'responsible' => $taskData['responsible'] ?? null,
                'priority' => $taskData['priority'] ?? null,
                'resources' => $taskData['resources'] ?? null,
                'upload' => $taskData['upload'] ?? null,
                'note' => $taskData['note'] ?? null,
                'status_update' => $taskData['status_update'] ?? null,
            ]);
    
            // Assign users to the task if provided (Manual Insert)
            if (!empty($taskData['assigned_users'])) {
                // First, delete old assigned users (if necessary)
                $task->assignedUsers()->delete();
    
                foreach ($taskData['assigned_users'] as $userId) {
                    EventTaskUser::create([
                        'event_task_id' => $task->id,
                        'user_id' => $userId,
                    ]);
                }
            }
    
            $createdTasks[] = new EventTaskResource($task);
        }
    
        return $this->sendResponse($createdTasks, 'Event Task(s) Created Successfully');
    }
    
    public function update(EventTaskRequest $request, Event $event)
    {

       
        $tasks = is_array($request->tasks) ? $request->tasks : [$request->all()];

        $updatedTasks = [];

        foreach ($tasks as $taskData) {
            $task = EventTask::findOrFail($taskData['id']);

            $task->update([
                'task_name' => $taskData['task_name'],
                'sequence' => $taskData['sequence'] ?? null,
                'start_time' => $taskData['start_time'],
                'finish_time' => $taskData['finish_time'],
                'responsible' => $taskData['responsible'] ?? null,
                'priority' => $taskData['priority'] ?? null,
                'resources' => $taskData['resources'] ?? null,
                'upload' => $taskData['upload'] ?? null,
                'note' => $taskData['note'] ?? null,
                'status_update' => $taskData['status_update'] ?? null,
            ]);

              // Assign users to the task if provided (Manual Insert)
              if (!empty($taskData['assigned_users'])) {
                // First, delete old assigned users (if necessary)
                $task->assignedUsers()->delete();
    
                foreach ($taskData['assigned_users'] as $userId) {
                    EventTaskUser::create([
                        'event_task_id' => $task->id,
                        'user_id' => $userId,
                    ]);
                }
            }
    
            $updatedTasks[] = new EventTaskResource($task);
        }

        return $this->sendResponse($updatedTasks, 'Event Task(s) Updated Successfully');
    }


    public function destroy(Request $request, Event $event)
    {
   

        $taskIds = is_array($request->task_ids) ? $request->task_ids : [$request->task_ids];
        
        foreach ($taskIds as $taskId) {
            $task = EventTask::findOrFail($taskId);
            $task->assignedUsers()->delete();
            $task->delete();
        }

        return $this->sendResponse([], 'Event Task(s) Deleted Successfully');
    }
}
