<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class GalleryDetail extends Component
{
    public $galleries;

    public function mount($slug)
    {
        $this->galleries = Gallery::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.gallery-detail');
    }
}
