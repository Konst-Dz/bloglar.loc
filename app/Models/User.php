<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \App\Models\Subscribe;

#[ObservedBy([UserObserver::class])]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function posts(): HasMany
    {
        return $this->HasMany(Post::class);
        //return $this->HasMany(Post::class)->chaperone();
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsToOne(Role::class);
    }

    public function subscribe(): HasMany
    {
        return $this->hasMany(Subscribe::class);
    }


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
    protected $dispatchesEvents = [
       /* 'saved' => UserSaved::class,
        'deleted' => UserDeleted::class,*/
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

    protected static function booted(): void
    {
        static::created(function (User $user) {
            echo 'created';
        });
    }

}
