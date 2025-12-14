<?php

namespace App\Services;

use App\Models\Ranking;
use App\Models\Score;
use Illuminate\Support\Facades\DB;

class RankingService
{

    // public function generateRankingSnapshot(): array 
    // {
    //     return DB::transaction(function()
    //     {   
    //         // get older rank player
    //         $oldRanking = Ranking::where('valid', true)
    //             ->get()
    //             ->pluck('rank', 'player_id')
    //             ->toArray();

    //         // set valid -> false
    //         Ranking::where('valid', true)->update(['valid' => false]);

    //         // get score active, sort by highest point
    //         $scores = Score::where('valid', true)
    //             ->with('player')
    //             ->orderByDesc('point')
    //             ->orderBy('player_id') //tiebreaker by playerid
    //             ->get();
                
    //         // Initial array
    //         $rankings = [];

    //         // calc new rank and movement
    //         $rank = 1;

    //         foreach ($scores as $score) 
    //         {
    //             $playerId = $score->player_id;
                
    //             $oldRank = $oldRanking[$playerId] ?? null;
                
    //             if ($oldRank === null)
    //             {
    //                 $movement = 'null';
    //             }

    //             elseif ($oldRank > $rank)
    //             {
    //                 $movement = '+'. ($oldRank - $rank);
    //             }

    //             elseif ($oldRank < $rank)
    //             {
    //                 $movement = '-'. ($rank - $oldRank);

    //             }

    //             else 
    //             {
    //                 $movement = 'none';
    //             }

    //             $rankings [] = Ranking::create([
    //                 'rank'      => $rank,
    //                 'player_id' => $playerId,
    //                 'point'     => $score->point,
    //                 'valid'     => true,
    //                 'rank_mov'  => $movement,
    //             ]);
                
    //             $rank++;
    //         }

    //         return $rankings;
    //     });

        
    // }


    public function generateRankingSnapshot(): array
    {
        return DB::transaction(function () {

            // Langkah 1: Persiapan dan Invalidate
            $previousRanks = $this->getPreviousRanks(); // [player_id => old_rank]
            $this->invalidateOldRankings();

            // Langkah 2: Hitung Peringkat Baru di Database (Optimasi)
            $rankingsToInsert = $this->calculateNewRankingsFromDB($previousRanks);

            // Langkah 3: Lakukan Bulk Insert (Optimasi)
            // Lakukan insert sekali untuk semua data yang telah dihitung
            if (!empty($rankingsToInsert)) {
                Ranking::insert($rankingsToInsert);
            }

            // Kembalikan data yang baru dibuat (jika diperlukan)
            return Ranking::where('valid', true)->get()->all();
        });
    }

    /**
     * Menggunakan Window Function di database untuk menghitung peringkat.
     * Menggantikan getCurrentScores() dan calculateRanksForGender().
     */
    private function calculateNewRankingsFromDB(array $previousRanks): array
    {
        // 1. Query untuk menghitung DENSE_RANK per gender di database.
        $rawRankQuery = DB::table('scores')
            ->select('scores.player_id')
            ->selectRaw('scores.point AS new_point')
            // Menggunakan DENSE_RANK untuk menghitung peringkat per gender (PARTITION BY p.gender)
            // dan diurutkan berdasarkan poin secara descending.
            ->selectRaw("
                DENSE_RANK() OVER (
                    PARTITION BY p.gender
                    ORDER BY scores.point DESC
                ) AS new_rank
            ")
            // Join ke tabel 'players' untuk mendapatkan kolom 'gender' dan 'name'
            ->join('players as p', 'scores.player_id', '=', 'p.id')
            ->where('scores.valid', true)
            ->get(); // Ambil hasilnya dalam satu query

        // 2. Iterasi di PHP HANYA untuk menghitung Movement (Logika PHP yang cepat)
        return $rawRankQuery->map(function ($rankRow) use ($previousRanks) {
            $oldRank = $previousRanks[$rankRow->player_id] ?? null;

            $movement = $this->calculateMovement(
                playerId: $rankRow->player_id,
                oldRank: $oldRank,
                newRank: $rankRow->new_rank
            );

            // Siapkan array untuk Bulk Insert
            return [
                'player_id'     => $rankRow->player_id,
                'rank'          => $rankRow->new_rank,
                'point'         => $rankRow->new_point,
                'valid'         => true,
                'rank_mov'      => $movement,
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        })->toArray();
    }

    // --- Metode Bawaan (Tidak Diubah) ---

    private function getPreviousRanks(): array
    {
        return Ranking::where('valid', true)
            ->get()
            ->pluck('rank', 'player_id')
            ->toArray();
    }

    private function invalidateOldRankings(): void
    {
        Ranking::where('valid', true)->update(['valid' => false]);
    }

    /**
     * Movement rules:
     * - null → pemain baru
     * - none → rank sama
     * - +n → naik
     * - -n → turun
     */
    private function calculateMovement(int $playerId, $oldRank, int $newRank): ?string
    {
        if ($oldRank === null) {
            return null; // pemain baru masuk ranking
        }

        if ($oldRank === $newRank) {
            return 'none'; // posisi tidak berubah
        }

        $diff = $oldRank - $newRank;
        return $diff > 0 ? "+$diff" : (string)$diff;
    }
}

