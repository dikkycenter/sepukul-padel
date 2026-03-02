<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Gallery;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        return view('livewire.home', [
            'events' => Event::whereDate('event_date', '>=', now())
                ->orderBy('event_date', 'asc') // Tanggal terdekat hari ini
                ->take(3)
                ->get(),

            'galleries' => Gallery::take(6)
                ->orderBy('event_date', 'desc')
                ->get(),
        ]);
    }
}
