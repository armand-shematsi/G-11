<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Participant extends Authenticatable
{
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'date_of_birth', 'school_id', 'image_path', 'password', 'status'
    ];

    // Ensure the password is hashed
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
