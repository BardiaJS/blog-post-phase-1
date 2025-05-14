<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'display_name',
        'first_name',
        'last_name',
        'gmail',
        'password',
        'phone_number',
        'age',
        'bio',
            
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function posts():HasMany{

        return $this->hasMany(Post::class , 'user_id');
    }
    public function follows(): BelongsToMany{

        return $this->belongsToMany(User::class, 'follows', 'user_id', 'user_followed_id');
    }

    public function followers(): BelongsToMany{

        return $this->belongsToMany(User::class, 'follows', 'user_followed_id', 'user_id');
    }
    
    public function comments():HasMany{

        return $this->hasMany(Comment::class , 'user_id');
    }
    
    public function members():HasMany{
        return $this->hasMany(Member::class , 'user_id');
    }

    public function privateMessges():HasMany{
        return $this->hasMany(PrivateMessage::class , 'user_id');
    }
}