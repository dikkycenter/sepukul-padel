<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventPage extends Component
{
    public function render()
    {
        return view(
            'livewire.event-page',
            [
                'events' => Event::latest()
                    ->paginate(9)
            ]
        );
    }
}
