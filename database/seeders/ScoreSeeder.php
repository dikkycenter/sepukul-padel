<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Score;
use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    public function run(): void
    {
        Player::all()->each(function ($player) {
            Score::create([
                'player_id' => $player->id,
                'point'     => rand(0, 17),
                'valid'     => true,
            ]);
        });
    }
}
