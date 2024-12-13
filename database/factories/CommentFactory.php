<?php

namespace Database\Factories;

use App\Traits\FactoryStates;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
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
            'text' => fake()->paragraph(rand(10,200)),
            'created_at' => $data,
            'updated_at' => $data,
        ];
    }

}
