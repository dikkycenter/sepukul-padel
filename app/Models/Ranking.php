<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ranking extends Model
{
    protected $fillable = [
        'rank', 'player_id', 'point', 'valid', 'rank_mov'
    ];

    public function player() : BelongsTo {
        return $this->belongsTo(Player::class);
    }
}
