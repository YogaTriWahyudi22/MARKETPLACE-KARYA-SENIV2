<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function proses_pesanan(Request $request)
    {
        $tambah = new Pesanan;
        $tambah->id_produk = $request->id_produk;
        $tambah->id_user = Auth::user()->id;
        $tambah->kuantiti = $request->kuantiti;
        $tambah->status = 'pending';
        $tambah->save();

        $produk = Produk::where('id_produk', '=', $request->id_produk)->first();
        $produk->jumlah_produk = $produk->jumlah_produk - $request->kuantiti;
        $produk->save();
        return redirect()->route('home');
    }

    public function pesanan()
    {
        $pemesanan = Pesanan::leftjoin('produk', 'pesanan.id_produk', '=', 'produk.id_produk')->leftjoin('users', 'produk.distributor_produk', '=', 'users.id')
            ->select('pesanan.kuantiti', 'pesanan.id_pesanan', 'pesanan.id_user', 'pesanan.status', 'produk.*', 'users.name as nama_distributor')->where('pesanan.id_user', Auth::user()->id)->get();
        $button = DB::table('pesanan')->orderBy('id_pesanan', 'DESC')->first();
        return view('halaman_user.pemesanan.index', compact('pemesanan', 'button'));
    }

    public function konfirmasi_pesanan()
    {
        $pesan = Pesanan::leftjoin('produk', 'pesanan.id_produk', '=', 'produk.id_produk')->leftjoin('users', 'pesanan.id_user', 'users.id')
            ->select('pesanan.*', 'users.name as nama_user', 'produk.*')->where('produk.distributor_produk', Auth::user()->id)->get();
        return view('halaman_toko.pemesanan.konfirmasi_pesanan', compact('pesan'));
    }

    public function konfirmasi(Request $request, $id_pesanan)
    {
        $konfir = Pesanan::where('id_pesanan', '=', $id_pesanan)->first();
        $konfir->status = 'konfirmasi';
        $konfir->save();

        session()->flash('status', 'Data Berhasil dikonfirmasi');
        return redirect()->route('konfirmasi_pesanan');
    }

    public function gagal(Request $request, $id_pesanan)
    {
        $konfir = Pesanan::where('id_pesanan', '=', $id_pesanan)->first();
        $konfir->status = 'gagal';
        $konfir->save();

        session()->flash('status', 'Data Berhasil dikonfirmasi');
        return redirect()->route('konfirmasi_pesanan');
    }

    public function destroy($id_pesanan)
    {
        $delete = pesanan::where('id_pesanan', '=', $id_pesanan)->first();
        $produk_kembali = Produk::where('id_produk', '=', $delete->id_produk)->first();

        $produk_kembali->jumlah_produk = $produk_kembali->jumlah_produk + $delete->kuantiti;
        $produk_kembali->save();
        $delete->delete();
        session()->flash('status', 'Data Berhasil dihapus');
        return redirect()->route('home');
    }
}
