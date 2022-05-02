<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $status
 */

class Task extends Model
{
    const NEW_TASK = 1;
    const WORK_TASK = 2;
    const CONSIDERED_TASK = 3;
    const DONE_TASK = 4;

    const HIGH_PRIORITY = 1;
    const MEDIUM_PRIORITY = 2;
    const LOW_PRIORITY = 3;

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
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function getPriority()
    {
        return [
            self::HIGH_PRIORITY => 'Высокий',
            self::MEDIUM_PRIORITY => 'Средний',
            self::LOW_PRIORITY => 'Низкий',
        ];
    }

    public function getPriorityText()
    {
        return $this->getPriority()[$this->priority_id];
    }
}
