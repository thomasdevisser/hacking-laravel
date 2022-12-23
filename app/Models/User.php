<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function avatar(): Attribute {
        return Attribute::make(get: function($value) {
            return $value ? "/storage/profile-images/$value" : "/storage/profile-images/profile-image-fallback.jpeg";
        });
    }

    public function posts() {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function followers() {
        return $this->hasMany(Follow::class, 'followed_user');
    }

    public function following() {
        return $this->hasMany(Follow::class, 'user_id');
    }

    public function feed() {
        return $this->hasManyThrough(
            Post::class, // end table
            Follow::class, // intermediate table
            'user_id', // foreign key for intermediate table
            'user_id', // foreign key for end table
            'id', // local key
            'followed_user' // local key for intermediate table
        );
    }
}
