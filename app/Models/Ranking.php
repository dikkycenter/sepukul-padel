<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ranking extends Model
{
    protected $fillable = [
        'rank',
        'player_id',
        'point',
        'valid',
        'rank_mov'
    ];

    protected $casts = [
        'valid'     => 'boolean',
        'rank'      => 'integer',
        'point'     => 'integer',
        'rank_mov'  => 'string'
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeValid(Builder $query): Builder
    {
        return $query->where('valid', true);
    }

    public function scopeByGender(Builder $query, string $gender): Builder
    {
        return $query->whereHas('player', function ($q) use ($gender) {
            $q->where('gender', $gender);
        });
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('rank');
    }

    public function scopeBestFive(Builder $query): Builder
    {
        return $query
            ->whereBetween('rank', [1, 5]);
    }

    public function scopeOthers(Builder $query): Builder
    {
        return $query
            ->where('rank', '>', 5);
    }

    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        return $query->when($search, function ($q) use ($search) {
            $q->whereHas('player', function ($p) use ($search) {
                $p->where('name', 'like', "%{$search}%");
            });
        });
    }
}
