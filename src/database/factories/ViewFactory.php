<?php

namespace Database\Factories;

use App\Models\View;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = View::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 22),
            'item_id' => $this->faker->numberBetween(1, 18),
            'view_count' => $this->faker->numberBetween(1, 50),
            'last_viewed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
