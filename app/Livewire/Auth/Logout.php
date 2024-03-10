<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;

class Logout extends Component
{
    #[Title('Logout')]
    public function render()
    {
        return view('livewire.auth.logout');
    }
}
