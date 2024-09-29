<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'lname', 'image', 'date_of_birth', 'phone_number', 'user_id'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'user_id' => 'integer',
    ];
}
