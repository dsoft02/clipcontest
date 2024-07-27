<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contestant;
use App\Models\Vote;

class ContestantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 15 contestants
        Contestant::factory(15)->create()->each(function ($contestant) {
            // Allocate a random number of votes (between 1 and 20) to each contestant
            Vote::factory(rand(1, 20))->create(['contestant_id' => $contestant->id]);
        });
    }
}
