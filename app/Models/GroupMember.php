<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    protected $fillable = ['people_group_id', 'user_id'];
    
    protected $table = 'group_members'; // Ensure the correct table is used
}
