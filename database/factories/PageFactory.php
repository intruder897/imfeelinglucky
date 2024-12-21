<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'is_active' => fake()->boolean(),
            'expires_at' => fake()->dateTimeInInterval('-1 week', '+1 week'),
            'user_id' => User::factory()
        ];
    }

    public function forUser(User $user): PageFactory
    {
        return $this->state(fn () => [
            'user_id' => $user->id,
        ]);
    }
}
