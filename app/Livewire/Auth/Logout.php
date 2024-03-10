<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.auth.logout');
    }

    public function logout()
    {
        session()->invalidate();
        session()->regenerate();
        Auth::logout();
        return $this->redirect('/login', navigate: true);
    }
}
