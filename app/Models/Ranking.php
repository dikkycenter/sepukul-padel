<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Ranking extends Model
{
    protected $fillable = [
        'rank', 'player_id', 'point', 'valid', 'rank_mov'
    ];

    protected $casts = [
        'valid'     => 'boolean',
        'rank'      => 'integer',
        'point'     => 'integer',
        'rank_mov'  => 'integer'
    ];

    public function player() : BelongsTo {
        return $this->belongsTo(Player::class);
    }

    
}
