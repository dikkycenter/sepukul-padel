<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'point',
        'valid'
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    
    public function updateNewScore(array $data) : self
    {
        return DB::transaction(function() use ($data)
        {
            // keep old data as history, valid -> false
            $this->update(['valid' => false]);
                 
            // create new data, valid->true
            return self::create([
                ...$data,
                'valid' => true,
            ]);
                    
        });
    }

}
