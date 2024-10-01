<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

  


    protected static function booted()
    {
        static::created(function ($user) {
            // Create UserProfile when a new User is created
            $user->createUserProfile();
        });
    }

    public function createUserProfile()
    {
        // Create a profile for the user with default data
        $this->profile()->create([
            // Set any default data for the profile fields here
            'user_id' => $this->id,  // Assuming there's a foreign key
            'created_at' => now(),
            'updated_at' => now(),
            // Add other fields here as necessary
        ]);
    }

    public function profile()
    {
        // Define the relationship between User and UserProfile
        return $this->hasOne(UserProfile::class);
    }

    public function task()
    {
        // Define the relationship between User and UserProfile
        return $this->hasMany(Task::class,'client_id','id');
    }


}
