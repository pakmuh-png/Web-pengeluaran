<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelanggan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pabrik_id' => \App\Models\Pabrik::inRandomOrder()->first()->id ?? \App\Models\Pabrik::factory(),
            'npk' => $this->faker->unique()->numerify('NPK#####'),
            'nama' => $this->faker->name(),
        ];
    }
}