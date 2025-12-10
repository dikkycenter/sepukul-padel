<?php

namespace App\Services;

use App\Models\Ranking;
use App\Models\Score;
use Illuminate\Support\Facades\DB;

class RankingService
{

    public function generateRankingSnapshot(): array 
    {
        return DB::transaction(function()
        {   
            // get older rank player
            $oldRanking = Ranking::where('valid', true)
                ->get()
                ->pluck('rank', 'player_id')
                ->toArray();

            // set valid -> false
            Ranking::where('valid', true)->update(['valid' => false]);

            // get score active, sort by highest point
            $scores = Score::where('valid', true)
                ->with('player')
                ->orderByDesc('point')
                ->orderBy('player_id') //tiebreaker by playerid
                ->get();
                
            // Initial array
            $rankings = [];

            // calc new rank and movement
            $rank = 1;

            foreach ($scores as $score) 
            {
                $playerId = $score->player_id;
                
                $oldRank = $oldRanking[$playerId] ?? null;
                
                if ($oldRank === null)
                {
                    $movement = 'null';
                }

                elseif ($oldRank > $rank)
                {
                    $movement = '+'. ($oldRank - $rank);
                }

                elseif ($oldRank < $rank)
                {
                    $movement = '-'. ($rank - $oldRank);

                }

                else 
                {
                    $movement = 'none';
                }

                $rankings [] = Ranking::create([
                    'rank'      => $rank,
                    'player_id' => $playerId,
                    'point'     => $score->point,
                    'valid'     => true,
                    'rank_mov'  => $movement,
                ]);
                
                $rank++;
            }

            return $rankings;
        });
    }
}

