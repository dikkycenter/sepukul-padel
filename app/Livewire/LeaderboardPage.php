<?php

namespace App\Livewire;

use App\Models\Ranking;
use Livewire\Component;
use Livewire\WithPagination;

class LeaderboardPage extends Component
{
    use WithPagination;

    public string $gender = 'L';
    public string $search = '';
    public int $activeSlide = 0;

    protected $updatesQueryString = ['search'];

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
        $this->activeSlide = 0;
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
        $this->activeSlide = 0;
    }

    public function nextSlide($total): void
    {
        if ($total <= 1) return;

        $this->activeSlide = ($this->activeSlide + 1) % $total;
    }

    public function prevSlide($total)
    {
        if ($total <= 1) return;

        $this->activeSlide = ($this->activeSlide - 1 + $total) % $total;
    }

    public function render()
    {
        $baseQuery = Ranking::query()
            ->with('player')
            ->valid()
            ->search($this->search)
            ->when(!$this->search, fn($q) => $q->byGender($this->gender))
            ->ordered();

        if ($this->search) {
            return view('livewire.leaderboard-page', [
                'bestPlayer' => collect(),
                'others' => $baseQuery->paginate(10),
            ]);
        }

        return view('livewire.leaderboard-page', [
            'bestPlayer' => (clone $baseQuery)
                ->bestFive()
                ->get(),

            'others' => (clone $baseQuery)
                ->others()
                ->paginate(10),
        ]);
    }
}
