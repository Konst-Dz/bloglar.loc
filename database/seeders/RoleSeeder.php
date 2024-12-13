<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'Registered user',
        ];

        foreach ($roles as $role) {
            Role::factory()->create(['role' => $role]);
        }
    }
}
