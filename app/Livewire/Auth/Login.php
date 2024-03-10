<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login')]
    public function render()
    {
        return view('livewire.auth.login');
    }

    public $username, $password, $remember_me;

    public function login()
    {

        $validatedDate = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $this->remember_me)) {
            return $this->redirect('/', navigate: true);
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    }

}
