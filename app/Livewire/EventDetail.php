<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventDetail extends Component
{
    public $events;

    public function mount($slug)
    {
        $this->events = Event::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.event-detail');
    }
}
