<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ScopedBy([AncientScope::class])]
class Post extends Model
{
    use HasFactory;
  //  use Prunable;
    //

    public function user(): BelongsTo
    {
       // return $this->hasOne(User::class, 'id', 'user_id');
       // return $this->belongsTo(User::class)->withDefault();
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /*public function prunable(): Builder
    {
        //return static::where('created_at', '<=', now()->subMonth());
    }
    protected function pruning(): void
    {
        // ...
    }*/
}
