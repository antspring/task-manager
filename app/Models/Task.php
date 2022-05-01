<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const NEW_TASK = 1;

    protected $fillable = [
        'executor_id',
        'creator_id',
        'title',
        'description',
        'status_id',
        'priority_id',
        'group_id'
    ];

    public function executor()
    {
        $this->belongsTo(User::class);
    }

    public function creator()
    {
        $this->belongsTo(User::class);
    }

    public function status()
    {
        $this->belongsTo(Status::class);
    }

    public function priority()
    {
        $this->belongsTo(Priority::class);
    }

    public function group()
    {
        $this->belongsTo(Group::class);
    }

    public function newTask()
    {
        return self::NEW_TASK;
    }
}
