<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->email(),
            'logradouro' => $this->faker->streetSuffix(),
            'endereco' => $this->faker->streetAddress(),
            'cep' => $this->faker->postcode(),
            'bairro' => $this->faker->city(),
        ];
    }
}
