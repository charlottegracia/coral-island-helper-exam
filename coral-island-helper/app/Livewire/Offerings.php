<?php

namespace App\Livewire;

use Livewire\Component;

class Offerings extends Component
{

    public $altars;
    public $fish;
    public $insects;
    public $critters;

    public function mount()
    {
        $this->altars = json_decode(file_get_contents(storage_path() . "/data/offerings.json"), true);
        $this->fish = json_decode(file_get_contents(storage_path() . "/data/fish.json"), true);
        $this->insects = json_decode(file_get_contents(storage_path() . "/data/bugs-and-insects.json"), true);
        $this->critters = json_decode(file_get_contents(storage_path() . "/data/ocean-critters.json"), true);
    }

    public function render()
    {
        return view('livewire.offerings');
    }
}
