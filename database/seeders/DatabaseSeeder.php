<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Medico::factory(10)
            ->for(Cidade::factory())
            ->has(Consulta::factory())
            ->create();
    }
}
