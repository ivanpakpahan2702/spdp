<?php

namespace App\Livewire\Pass;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Component;

class ForgotPass extends Component
{

    public function index()
    {
        return view('pass.forgot-password');
    }

    public function sending(Request $request)
    {
        $rules = [
            'email' => 'required',
        ];
        $validator = validator()->make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['type' => 'error', 'message' => '' . $validator->errors()]);
        }

        $status = Password::sendResetLink(
            ['email' => $request->input('email')]
        );

        return $status === Password::RESET_LINK_SENT ? response()->json(['type' => 'success', 'message' => '{"email" : ["Berhasil Kirim Formulir Ubah Password Ke Alamat Email Anda."]}', 'status' => __($status)]) : response()->json(['type' => 'error', 'message' => '{"email":["Email Tidak Terdaftar"]}', 'email' => __($status)]);

    }

    public function handle(string $token)
    {
        return view('pass.reset-password', [
            'token' => $token,
            'email' => request()->email,
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];

        $validator = validator()->make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['type' => 'error', 'message' => '' . $validator->errors()]);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? response()->json(['type' => 'success', 'message' => '{"notif" : ["Berhasil Mengubah Password"]}', 'status' => __($status)])
        : response()->json(['type' => 'error', 'message' => '{"notif" : ["Terjadi Kesalahan"]}', 'status' => __($status)]);
    }
}
