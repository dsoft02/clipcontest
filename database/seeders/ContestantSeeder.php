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
        // Track used IP addresses to ensure uniqueness
        $usedIps = [];

        // Function to generate a unique IP address
        function generateUniqueIp(&$usedIps) {
            do {
                $ip = '192.168.1.' . rand(1, 255);
            } while (in_array($ip, $usedIps));
            $usedIps[] = $ip;
            return $ip;
        }

        // Manually create 15 contestants with random data
        for ($i = 1; $i <= 15; $i++) {
            $contestant = Contestant::create([
                'name' => 'Contestant ' . $i,
                'description' => 'Description for Contestant ' . $i,
                'cover_image' => null,
                'video_link' => 'http://example.com/video' . $i,
            ]);

            // Manually create a random number of votes (between 1 and 20) for each contestant
            for ($j = 1; $j <= rand(1, 20); $j++) {
                Vote::create([
                    'contestant_id' => $contestant->id,
                    'email' => 'voter' . $i . '_' . $j . '@example.com',
                    'ip_address' => generateUniqueIp($usedIps),
                    'created_at' => now(),
                ]);
            }
        }
    }
}
