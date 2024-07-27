<?php

namespace Database\Factories;

use App\Models\Vote;
use App\Models\Contestant;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoteFactory extends Factory
{
    protected $model = Vote::class;

    public function definition()
    {
        return [
            'contestant_id' => Contestant::factory(),
            'email' => $this->faker->unique()->safeEmail,
            'ip_address' => $this->faker->unique()->ipv4,
        ];
    }
}
