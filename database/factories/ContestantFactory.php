<?php

namespace Database\Factories;

use App\Models\Contestant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContestantFactory extends Factory
{
    protected $model = Contestant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'cover_image' => null,
            'video_link' => $this->faker->url,
        ];
    }
}
