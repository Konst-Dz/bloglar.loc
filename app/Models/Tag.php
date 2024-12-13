<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Database\Factories\TagFactory;
class Tag extends Model
{
    use HasFactory;
    private mixed $tags;
    //
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function getTags() {
        return $this->tags;
    }
    public function widthTags($tags) {
        $this->tags = $tags;
    }
}
