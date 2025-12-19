<?php

namespace App\Observers;

use App\Models\Player;
use App\Models\Score;
use App\Traits\OptimizeImages;
use Illuminate\Support\Facades\Storage;

class PlayerObserver
{   
    use OptimizeImages;

    public function created(Player $player) :void
    {
        Score::create([
            'player_id' => $player->id,
            'point'      => 0,
            'valid'     => true,
            'notes'     => 'Initial score on player creation'
        ]);
    }

    
    public function updating(Player $player): void
    {
        if ($player->isDirty('avatar')) {
            $oldAvatar = $player->getOriginal('avatar');

            if ($oldAvatar && Storage::disk('public')->exists($oldAvatar)) {
                Storage::disk('public')->delete($oldAvatar);
            }
        }
    }

    public function saved(Player $player): void
    {
        if (! $player->wasChanged('avatar')) {
            return;
        }

        if (! Storage::disk('public')->exists($player->avatar)) {
            return;
        }

        $this->optimizePngImage($player->avatar);
    }


    public function deleting(Player $player): void
    {
        if ($player->avatar && Storage::disk('public')->exists($player->avatar)) {
            Storage::disk('public')->delete($player->avatar);
        }
    }
}
