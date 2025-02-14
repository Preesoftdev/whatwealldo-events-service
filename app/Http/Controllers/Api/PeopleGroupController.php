<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeopleGroup\PeopleGroupRequest;
use App\Http\Resources\PeopleGroupResource;
use App\Models\GroupMember;
use App\Models\PeopleGroup;
use App\Traits\ResponseMethodTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PeopleGroupController extends Controller
{
    use ResponseMethodTrait;

    public function index()
    {
        $user = _user();
        $groups = PeopleGroup::with('members')->where('user_id', $user->id)->get();

        // Extract user IDs from group members
        $userIds = $groups->flatMap(fn($group) => $group->members->pluck('user_id'))->unique()->toArray();
    
        // Fetch user details from the user microservice
        $users = Http::get(env('APP_INTERNAL_LINK') . '/api/users', [
            'ids' => implode(',', $userIds) // Send user IDs as a query parameter
        ])->json();
    
        // Attach user details to group members
        $groups->each(function ($group) use ($users) {
            $group->members->each(function ($member) use ($users) {
                $member->user_details = collect($users)->firstWhere('id', $member->user_id);
            });
        });
    
        return $this->sendResponse(PeopleGroupResource::collection($groups), 'People Group members Retrieved Successfully');
    
    }

    public function store(PeopleGroupRequest $request)
    {
        $user = _user();
        // Create the group with the request data and associate it with the creator
        $group = PeopleGroup::updateOrCreate(
            [
                'user_id' => $user->id,
                'name' => $request->name,
                'privacy' => $request->privacy
            ]
        );
        

        return $this->sendResponse($group, 'Group Created Successfully');
    }
    public function update(PeopleGroupRequest $request)
    {
        $user = _user();
        // Create the group with the request data and associate it with the creator
        $group = PeopleGroup::updateOrCreate(
            ['user_id' => $user->id,
             'name' => $request->name,
            ], // Search condition
            [               
                'privacy' => $request->privacy
            ]
        );
        

        return $this->sendResponse($group, 'Group Created Successfully');
    }


    public function addMember(Request $request, PeopleGroup $group)
    {
        // Validate the request
        $validated = $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'integer', // Ensure each value in the array is a valid integer
        ]);
    
        // Ensure $userIds is an array of user IDs
        $userIds = $validated['user_ids']; 
    
        // Insert each user ID into the group_members table
        foreach ($userIds as $userId) {
            GroupMember::firstOrCreate([
                'people_group_id' => $group->id,
                'user_id' => $userId,
            ]);
        }    
    
 
     return $this->sendResponse(new PeopleGroupResource($group->load('members'), 'Users added to the group successfully'));
    }
}
