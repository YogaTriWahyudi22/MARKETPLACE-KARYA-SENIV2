<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function halaman_awal()
    {
        return view('halaman_user.home.index');
    }

    public function dashboard()
    {
        return view('halaman_admin.dashboard.index');
    }

    public function home()
    {
        return view('halaman_user.home.index');
    }
}
