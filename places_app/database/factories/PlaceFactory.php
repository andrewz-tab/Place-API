<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(['New York', 'оз. Байкал', 'Красная Площадь', 'LAX Airport', 'Национальный парк Файордленд', 'Диснейленд', 'Пизанская Башня', 'Эльбрус', 'Йеллоустон', 'Памуккале', 'Горы Тяньцзы', 'Гранд-Каньон', 'Ниагарский водопад', 'Дорога гигантов']),
            'latitude' => fake()->numberBetween(100000,18000000) / 100000,
            'longitude' => fake()->numberBetween(100000,9000000) / 100000,
        ];
    }
}
