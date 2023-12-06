<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Correspondencias>
 */
class CorrespondenciasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha' => fake()->dateTimeInInterval('-1 week', '+3 days'),
            'remitente' => fake()->firstName(),
            'asunto' => fake()->catchPhrase(),
            'cite' => fake()->dateTimeInInterval('-1 week', '+5 days'),
            'destinatario_id' => fake()->numberBetween(1, 100),
        ];
    }
}
