<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Authenticator extends Component
{
    public function render_login()
    {
        return view('livewire.auth.authenticator_login');
    }

    public function render_register()
    {
        return view('livewire.auth.authenticator_register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'required|max:50',
                'username' => 'required|max:20|unique:users',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
            ]
        );
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['foto_profil'] = 'default_user.png';
        $user = User::create($validatedData);
        // event(new Registered($user));
        Auth::login($user);
        return redirect()->route('home')->with('Success', 'Berhasil Daftar Akun');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->redirect('/', navigate: true);
    }
}
