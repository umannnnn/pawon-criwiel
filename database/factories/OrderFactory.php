<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'product' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name(),
            'customer' => $this->faker->name(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'desc' => $this->faker->sentence(),
            'invoice' => function (array $attributes) {
                return date('ym') . sprintf('%02d', $attributes['id']);
            }
        ];
    }
}
