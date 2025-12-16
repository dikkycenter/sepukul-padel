<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LeaderboardPage extends Component
{
    public string $gender = 'L';
    public int $activeSlide = 0;

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
        $this->activeSlide = 0;
    }

    public function nextSlide($total): void
    {
        if ($total === 0) return;

        $this->activeSlide = ($this->activeSlide + 1) % $total;
    }

    public function startAutoSlide(int $total): void
    {
        if ($total <= 1) return;

        $this->dispatch('start-auto-slide', total: $total);
    }

    public function prevSlide($total)
    {
        $this->activeSlide = ($this->activeSlide - 1 + $total) % $total;
    }

    public function getLeaderboard()
    {
    return DB::table('rankings')
    ->join('players', 'players.id', '=', 'rankings.player_id')
    ->where('rankings.valid', true)
    ->where('players.gender', $this->gender)
    ->orderBy('rankings.rank')
    ->get();
    }

    public function render()
    {
        return view('livewire.leaderboard-page',[
            'players' => $this->getLeaderboard(),
        ]);
    }
}
