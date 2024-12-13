<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;

trait FactoryStates
{
    public function addAuthor($users): Factory
    {
        return $this->state(function (array $attributes) use ($users) {
            return [
                'user_id' => $users->random()->id,
            ];
        });
    }

    public function pinToPost($posts): Factory
    {
        return $this->state(function (array $attributes) use ($posts) {
            return [
                'post_id' => $posts->random()->id,
            ];
        });
    }
}
