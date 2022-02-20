<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;

class JenisKaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index_jenis = JenisProduk::all();
        return view('halaman_toko.jenis_produk_karya_seni.index', compact('index_jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_toko.jenis_produk_karya_seni.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new JenisProduk;
        $tambah->jenis_karya_seni = $request->jenis_karya_seni;
        $tambah->save();
        session()->flash('berhasil', 'Data Berhasil ditambahkan');
        return redirect()->route('jenis_produk_karya_seni');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jenis)
    {
        $edit = JenisProduk::where('id_jenis', $id_jenis)->first();
        return view('halaman_toko.jenis_produk_karya_seni.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis)
    {
        $update = JenisProduk::where('id_jenis', $id_jenis)->first();
        $update->jenis_karya_seni = $request->jenis_karya_seni;
        $update->save();
        session()->flash('berhasil', 'Data Berhasil ditambahkan');
        return redirect()->route('jenis_produk_karya_seni');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis)
    {
        $delete = JenisProduk::where('id_jenis', $id_jenis)->first();
        $delete->delete();
        session()->flash('status', 'Data Berhasil dihapus');
        return redirect()->route('jenis_produk_karya_seni');
    }

    public function jenis_karya($id_jenis)
    {
        $jenis_karya = JenisProduk::leftjoin('produk', 'jenis_karya_seni.id_jenis', '=', 'produk.jenis_karya_seni')->where('id_jenis', $id_jenis)
            ->select('produk.*', 'jenis_karya_seni.id_jenis', 'jenis_karya_seni.jenis_karya_seni as karya_seni_jenis')->first();
        return view('halaman_user.home.jenis_karya_seni', compact('jenis_karya'));
    }
}
