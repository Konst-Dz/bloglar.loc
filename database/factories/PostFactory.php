<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\User;
use App\Traits\FactoryStates;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Ramsey\Collection\Collection;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    use FactoryStates;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = fake()->dateTimeBetween('-1 year', 'now');
        return [
            'title' => fake()->sentence(),
            'text' => fake()->paragraph(300),
            'slug' => fake()->slug(),
            'is_public' => 1,
            'created_at' => $data,
            'updated_at' => $data,
        ];
    }


   /* public function configure(): static
    {
        return $this->afterMaking(function (User $user) {
            // ...
        })->afterCreating(function (User $user) {
            // ...
        });
    }*/
}
