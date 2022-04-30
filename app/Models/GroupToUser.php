<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupToUser extends Model
{
    const ADMIN = 1;

    protected $table = 'group_to_user';

    protected $fillable = ['user_id', 'role_id', 'group_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function admin()
    {
        return self::ADMIN;
    }
}
