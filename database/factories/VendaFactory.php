<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venda>
 */
class VendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'venda' => $this->faker->randomNumber(),
            'cliente_id' => Cliente::inRandomOrder()->first()->id,
            'produto_id' => Produto::inRandomOrder()->first()->id,
        ];
    }
}
