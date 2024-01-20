<?php

namespace App\Livewire;

use Livewire\Component;

class Museum extends Component
{

    public $donations;

    public function mount()
    {
        $this->donations = json_decode(file_get_contents(storage_path() . "/data/museum-checklist.json"), true);
    }

    public function render()
    {
        return view('livewire.museum');
    }
}
