<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => "Super Admin", //fake()->name(),
            'lastname' => "Admin",
            'email' => "superadmin@yopmail.com", //fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('Admin@123'), //static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'phone' => $this->faker->phoneNumber,
            'street_address' => $this->faker->streetAddress,
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'zipcode' => substr($this->faker->postcode, 0, 6),
            'role_id' => 1, // Set the role_
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
