<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Beranda extends Component
{

    #[Title('Beranda')]
    public function render()
    {
        return view('livewire.beranda');
    }

}
