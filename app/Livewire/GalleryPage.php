<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class GalleryPage extends Component
{
    public function render()
    {
        return view('livewire.gallery-page', [
            'galleries' => Gallery::latest()->paginate(9)
        ]);
    }
}
