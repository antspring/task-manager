<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $role_id
 * @property int $group_id
 *
 */

class GroupToUser extends Model
{
    const ADMIN = 1;
    const MODER = 2;
    const USER = 3;

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

    public function adminRole()
    {
        return self::ADMIN;
    }

    public function moderRole()
    {
        return self::MODER;
    }

    public function userRole()
    {
        return self::USER;
    }
}
