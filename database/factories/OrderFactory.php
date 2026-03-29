<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Material;
use App\Models\Pelanggan;
use App\Models\Area;
use App\Models\Pabrik;
use App\Models\Planner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_code' => $this->faker->unique()->bothify('ORD-####-??'),
            'material_id' => Material::inRandomOrder()->first()->id ?? Material::factory(),
            'pelanggan_id' => Pelanggan::inRandomOrder()->first()->id ?? Pelanggan::factory(),
            'area_id' => Area::inRandomOrder()->first()->id ?? Area::factory(),
            'pabrik_id' => Pabrik::inRandomOrder()->first()->id ?? Pabrik::factory(),
            'planner_id' => Planner::inRandomOrder()->first()->id ?? Planner::factory(),
            'order_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'quantity' => $this->faker->numberBetween(1, 100),
            'no_reservation' => $this->faker->bothify('RES-####-??'),
            'status' => $this->faker->randomElement(['true', 'false']),
            'shift' => $this->faker->randomElement(['rutin', 'ta']),
        ];
    }
}
