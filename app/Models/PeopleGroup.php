<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleGroup extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'privacy'];

    public function members()
    {
        return $this->hasMany(GroupMember::class, 'people_group_id');
    }



    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
