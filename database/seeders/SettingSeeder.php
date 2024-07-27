<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'ClipContest'],
            ['key' => 'light_logo', 'value' => ''],
            ['key' => 'dark_logo', 'value' => ''],
            ['key' => 'light_icon', 'value' => ''],
            ['key' => 'dark_icon', 'value' => ''],
            ['key' => 'favicon', 'value' => ''],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
