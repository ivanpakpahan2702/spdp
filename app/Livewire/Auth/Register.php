<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Title('Register')]
    public function render()
    {
        return view('livewire.auth.register');
    }

    #[Validate('required|max:50')]
    public $nama = '';

    #[Validate('required|max:20|unique:users')]
    public $username = '';

    #[Validate('required|unique:users')]
    public $email = '';

    #[Validate('required|min:6')]
    public $password = '';

    public function register()
    {
        $this->validate();
        $user = User::create([
            'nama' => $this->nama,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'foto_profil' => 'default_user.png',
        ]);
        Auth::login($user);
        return $this->redirect('/', navigate: true);

    }
}
