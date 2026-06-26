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

    protected $username  = 'email';
    protected $loginPath = '/auth/login';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Redirect setelah login berhasil berdasarkan status user
     */
    public function redirectPath()
    {
        $user = Auth::user();
        if ($user && $user->status == 'S') {
            return url('/siswa');
        }
        return url('/guru');
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
