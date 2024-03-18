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
            'user_id' => $this->faker->unique()->numberBetween(3, 22),
            'username' => $this->faker->name,
            'postcode' => $this->faker->postcode,
            'address' => $this->faker->prefecture() . $this->faker->city() . $this->faker->streetAddress(),
            'building' => $this->faker->secondaryAddress,
            'icon_url' => url('img/icon/' . $this->faker->randomElement([
                'alpaca.jpg', 'bird.jpg', 'boar.jpg', 'dog.jpg', 'elephant.jpg',
                'fish.jpg', 'flamingo.jpg', 'horse.jpg', 'pig.jpg', 'shrimp.jpg'])),
        ];
    }
}
