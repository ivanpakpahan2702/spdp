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

    public $email, $password, $remember_me;

    public function login()
    {

        $validatedDate = $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            return $this->redirect('/', navigate: true);
        } else {

            $this->dispatch('alert',
                type: 'error',
                title: 'Login Gagal.',
                position: 'center',
            );
            $this->addError('login_error', 'Email atau Password Salah');
        }

    }

}
