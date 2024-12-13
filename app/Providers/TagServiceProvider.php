<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tag;

class TagServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Tag::class, function ($app) {
            $tag = new Tag();
            $tags = Tag::all(['id', 'name']);
            $tag->widthTags($tags);
            return $tag;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
