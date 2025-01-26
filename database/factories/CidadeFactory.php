<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CidadeFactory extends Factory
{
    protected $model = Cidade::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->city(),
            'estado' => $this->faker->password(2, 2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
