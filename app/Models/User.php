<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password', // Ensure password is hidden from array and JSON output
        'remember_token',
    ];

    // Optional: Add casts for specific fields
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed', // Remove if you're using Laravel < 9 and don't need this
    ];

    // Mutator to hash the password when setting it
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}

