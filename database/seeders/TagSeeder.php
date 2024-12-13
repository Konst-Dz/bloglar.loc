<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'technology',
            'automotive',
            'finance',
            'politics',
            'culture',
            'sports',
            'cooking',
            'fishing',
            'other',
        ];

        foreach ($tags as $tag) {
            Tag::factory()->create(['name' => $tag]);
        }
    }
}
