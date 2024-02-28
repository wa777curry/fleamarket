<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(3, 7),
            'username' => $this->faker->name,
            'postcode' => $this->faker->postcode,
            'address' => $this->faker->prefecture() . $this->faker->city() . $this->faker->streetAddress(),
            'building' => $this->faker->secondaryAddress,
            'icon_url' => '/storage/icon/' . $this->faker->randomElement(['bird.jpg', 'dog.jpg', 'fish.jpg', 'pig.jpg', 'shrimp.jpg']),
        ];
    }
}
