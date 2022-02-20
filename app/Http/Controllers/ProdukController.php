<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::leftjoin('users', 'produk.distributor_produk', '=', 'users.id')->leftjoin('jenis_karya_seni', 'produk.jenis_karya_seni', '=', 'jenis_karya_seni.id_jenis')
            ->select('produk.*', 'users.*', 'jenis_karya_seni.jenis_karya_seni as jenis_karya')->where('distributor_produk', Auth::user()->id)->get();
        return view('halaman_toko.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tambah_jenis =  JenisProduk::all();
        return view('halaman_toko.produk.tambah', compact('tambah_jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $photo = $request->file('photo');
        $photo_name = time() . '.' . $photo->extension();
        $photo->move(public_path('gambar'), $photo_name);

        $produk = new Produk;

        $produk->distributor_produk = Auth::user()->id;
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->jenis_karya_seni = $request->jenis_karya_seni;
        $produk->jumlah_produk = $request->jumlah_produk;
        $produk->harga = $request->harga;
        $produk->photo = $photo_name;
        $produk->satuan = $request->satuan;
        $produk->diskon = $request->diskon;
        $produk->save();

        session()->flash('berhasil', 'Data Berhasil ditambahkan');
        return redirect()->route('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_produk)
    {
        $detail_produk = Produk::leftjoin('users', 'produk.distributor_produk', 'users.id')->select('produk.*', 'users.name')->where('id_produk', $id_produk)->first();
        return view('halaman_toko.produk.detail', compact('detail_produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_produk)
    {
        $edit = Produk::where('id_produk', $id_produk)->first();
        $edit_produk =  JenisProduk::where('id_jenis', $edit->jenis_karya_seni)->first();
        $edit_jenis =  JenisProduk::all();
        return view('halaman_toko.produk.edit', compact('edit', 'edit_jenis', 'edit_produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {
        if ($request->photo) {
            $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,svg',
            ]);
            $photo = $request->file('photo');
            $photo_name = time() . '.' . $photo->extension();
            $photo->move(public_path('gambar'), $photo_name);

            $update = produk::find($request->id_produk);
            $update->photo = $photo_name;
            $update->nama_produk = $request->nama_produk;
            $update->jenis_karya_seni = $request->jenis_karya_seni;
            $update->deskripsi = $request->deskripsi;
            $update->jumlah_produk = $request->jumlah_produk;
            $update->harga = $request->harga;
            $update->diskon = $request->diskon;
            $update->save();
            session()->flash('berhasil', 'Data Berhasil Edit');
            return redirect()->route('produk');
        } else {

            $update = produk::find($request->id_produk);
            $update->nama_produk = $request->nama_produk;
            $update->deskripsi = $request->deskripsi;
            $update->jenis_karya_seni = $request->jenis_karya_seni;
            $update->jumlah_produk = $request->jumlah_produk;
            $update->harga = $request->harga;
            $update->diskon = $request->diskon;
            $update->save();
            session()->flash('berhasil', 'Data Berhasil Edit');
            return redirect()->route('produk');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produk)
    {
        $delete = Produk::find($id_produk);
        $delete->delete();
        unlink(public_path('gambar/' . $delete->photo));
        session()->flash('status', 'Data Berhasil dihapus');
        return redirect()->route('produk');
    }
}
