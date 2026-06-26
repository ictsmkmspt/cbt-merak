<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $username = 'email';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Override postLogin sepenuhnya.
     * Login gagal → redirect ke '/' dengan flash session error + role
     * Login berhasil → redirect berdasarkan status user
     */
    public function postLogin(Request $request)
    {
        $email    = $request->input('email');
        $password = $request->input('password');
        $remember = $request->has('remember');
        $role     = $request->input('role', 'guru');

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            // Login berhasil — redirect berdasarkan status user
            $user = Auth::user();
            if ($user->status == 'S') {
                return redirect('/siswa');
            }
            return redirect('/guru');
        }

        // Login gagal — kembali ke halaman utama dengan pesan error
        return redirect('/')
            ->with('login_error', 'Email atau password yang Anda masukkan salah.')
            ->with('login_role', $role)
            ->withInput($request->only('email'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'nama'     => $data['nama'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
