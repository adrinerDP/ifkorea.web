<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email',
        'name',
        'nickname',
        'avatar',
        'sns_id',
        'sns_type',
    ];

    protected $casts = [
        'admin' => 'boolean'
    ];

    public function verifications()
    {
        return $this->hasMany('App\Models\Verify');
    }
}
