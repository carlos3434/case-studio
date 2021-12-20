<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'password' => bcrypt('12345678'),
            'user_id' => $this->faker->randomNumber(6, true),
            'name_prefix' => $this->faker->randomElement(['SR', 'SRA']),
            'first_name' => $this->faker->userName(),
            'middle_initial' => $this->faker->userName(),
            'last_name' => $this->faker->userName(),
            'gender' => $this->faker->randomElement(['F', 'M']),
            'email' => $this->faker->email(),
            'fathers_name' => $this->faker->userName(),
            'mothers_name' => $this->faker->userName(),
            'mothers_maiden_name' => $this->faker->userName(),
            'date_of_birth' => $this->faker->date(),
            'date_of_joining' => $this->faker->date(),
            'salary' => strval( $this->faker->randomNumber(6, true)),
            'ssn' => strval( $this->faker->randomNumber(6, true)),
            'phone' => strval($this->faker->randomNumber(6, true)),
            'city' => $this->faker->word(),
            'state' => $this->faker->randomElement(['CO', 'LA', 'IN']),
            'zip' => $this->faker->randomNumber(5, true),

        ];
    }
}
