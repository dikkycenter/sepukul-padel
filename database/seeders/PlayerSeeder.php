<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Score;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::factory(500)->create()->each(function ($player) {
            Score::factory()->create([
                'player_id' => $player->id,
            ]);
        });
    }
}
