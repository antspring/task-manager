<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priority';

    protected $fillable = ['name', 'color'];

    public function task()
    {
        return $this->hasMany(Task::class, 'id');
    }
}
