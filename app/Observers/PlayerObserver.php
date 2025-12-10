<?php

namespace App\Observers;

use App\Models\Player;
use App\Models\Score;

class PlayerObserver
{
    public function created(Player $player) :void
    {
        Score::create([
            'player_id' => $player->id,
            'pont'      => 0,
            'valid'     => true,
            'notes'     => 'Initial score on player creation'
        ]);
    }
}
