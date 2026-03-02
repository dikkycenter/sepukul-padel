<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        $events = Event::upcoming()->take(3)->get();

        if ($events->count() < 3) {
            $events = $events->merge(
                Event::past()
                    ->take(3 - $events->count())
                    ->get()
            );
        }
        return view('livewire.home', [
            'events' => $events,

            'galleries' => Gallery::take(6)
                ->orderBy('event_date', 'desc')
                ->get(),
        ]);
    }
}
