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

    // Default redirect (akan di-override oleh redirectPath())
    protected $redirectTo = '/guru';

    protected $username = 'email';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Redirect setelah login berdasarkan status user:
     * - Status A (Admin) atau G (Guru) → /guru
     * - Status S (Siswa)               → /siswa
     */
    public function redirectPath()
    {
        $user = Auth::user();
        if ($user) {
            if ($user->status == 'S') {
                return url('/siswa');
            }
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
