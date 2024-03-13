<?php

namespace App\Livewire\Profile;

use Livewire\Attributes\Title;
use Livewire\Component;

class Setting extends Component
{
    #[Title('Pengaturan Akun')]
    public function render()
    {
        return view('livewire.profile.setting');
    }
}
