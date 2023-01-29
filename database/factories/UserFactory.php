<?php

namespace Database\Factories;
use App\Enums\UserType;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory {
    public function definition() {
        $sections = Section::all()->random()->id;
        $publisherTypes = 'Publisher';
        $users = [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'), // password
            'remember_token' => Str::random(10),
            'type' => $this->faker->randomElement(['Publisher', 'User']),
            'status' => false,
        ];
        $users['section_id'] = $users['type'] === $publisherTypes ? $sections : null;
        return $users;
    }

    public function unverified() {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}