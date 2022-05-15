<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'description','slug'];

    public function groupToUser()
    {
        return $this->hasMany(GroupToUser::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function setKeyName($slug)
    {
        $this->primaryKey = $slug;

        return $this;
    }
}
