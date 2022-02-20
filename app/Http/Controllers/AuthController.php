<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('halaman_login.login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $proses = $request->only('email', 'password');
        if (Auth::attempt($proses)) {
            $user = Auth::User();
            if ($user->status == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->status == 'toko') {
                return redirect()->intended('toko');
            } elseif ($user->status == 'user') {
                return redirect()->intended('user');
            }
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }

    public function admin()
    {
        if (Auth::user()->status == 'admin') {

            return view('halaman_admin.dashboard.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function toko()
    {
        if (Auth::user()->status == 'toko') {

            return view('halaman_admin.dashboard.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function user()
    {
        if (Auth::user()->status == 'user') {

            return view('halaman_user.home.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function register()
    {
        return view('halaman_login.register');
    }

    public function proses_register(Request $request)
    {
        $register = new User;
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->nohp = $request->nohp;
        $register->alamat = $request->alamat;
        $register->status = $request->status;
        $register->save();

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
