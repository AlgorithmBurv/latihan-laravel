<?php

namespace Database\Factories;


use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'class_id' => Arr::random([1, 2, 3, 4]),
            'name' => $faker->name(),
            'gender' => Arr::random(['L', 'P']),
            'nis' => mt_rand(000001, 999999)
        ];

        // return [
        //     'class_id' => $this->faker->Arr::random([1, 10]),
        //     'name' => $this->faker->name(),
        //     'gender' => $this->faker->Arr::random(['L', 'P']),
        //     'nis' => $this->faker->mt_rand(000001, 999999)

        // ];
    }
}
