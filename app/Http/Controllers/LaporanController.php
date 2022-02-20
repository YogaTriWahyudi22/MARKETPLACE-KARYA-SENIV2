<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use App\Models\RincianPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function pesanan_saya()
    {
        $pesanan_saya = Faktur::leftjoin('rincian_pembayaran', 'faktur.id_rincian_pembayaran', '=', 'rincian_pembayaran.id_rincian_pembayaran')->leftjoin('produk', 'rincian_pembayaran.id_produk', '=', 'produk.id_produk')
            ->leftjoin('users', 'faktur.id_user', '=', 'users.id')->leftjoin('pembayaran', 'faktur.id_pay', '=', 'pembayaran.id_pay')->leftjoin('kota', 'faktur.id_kota', '=', 'kota.id_kota')->where('faktur.id_user', Auth::user()->id)
            ->select('produk.nama_produk', 'produk.harga', 'produk.photo as photo_produk', 'rincian_pembayaran.kuantiti', 'rincian_pembayaran.*', 'pembayaran.tipe_pembayaran', 'users.name as nama_pelanggan', 'kota.kota', 'faktur.konfirmasi', 'rincian_pembayaran.id_rincian_pembayaran')->get();
        return view('halaman_user.laporan.pesanan_saya', compact('pesanan_saya'));
    }

    public function faktur()
    {
        $user = DB::table('faktur')->leftjoin('users', 'faktur.id_user', '=', 'users.id')->leftjoin('rincian_pembayaran', 'faktur.id_rincian_pembayaran', '=', 'rincian_pembayaran.id_rincian_pembayaran')->leftjoin('produk', 'rincian_pembayaran.id_produk', '=', 'produk.id_produk')->leftJoin('pembayaran', 'faktur.id_pay', '=', 'pembayaran.id_pay')
            ->select('faktur.tanggal_bayar', 'faktur.kode_faktur', 'faktur.konfirmasi', 'users.name', 'users.nohp', 'pembayaran.tipe_pembayaran', 'produk.distributor_produk')->where('faktur.id_user', Auth::user()->id)->orderBy('faktur.kode_faktur')
            ->first();
        // dd($user);
        $faktur = DB::table('faktur')->leftjoin('rincian_pembayaran', 'faktur.id_rincian_pembayaran', '=', 'rincian_pembayaran.id_rincian_pembayaran')->leftjoin('produk', 'rincian_pembayaran.id_produk', '=', 'produk.id_produk')->leftjoin('kurir', 'faktur.id_kurir', '=', 'kurir.id_kurir')
            ->leftjoin('pembayaran', 'faktur.id_pay', '=', 'pembayaran.id_pay')
            ->select('rincian_pembayaran.kuantiti', 'produk.nama_produk', 'rincian_pembayaran.jumlah_pembayaran', 'produk.diskon', 'kurir.nama_kurir', 'kurir.harga as harga_kurir')->where('rincian_pembayaran.status', 'konfirmasi')->orwhere('rincian_pembayaran.status', 'sampai')->where('faktur.id_user', Auth::user()->id)->get();
        // dd($faktur);
        // $admin = DB::table('faktur')->leftjoin('produk', 'faktur.id_produk', '=', 'produk.id_produk')->leftjoin('users', 'produk.id_produk', '=', 'users.id')->first();
        return view('halaman_user.laporan.faktur', compact('user', 'faktur'));
    }

    public function barang_sampai($id_rincian_pembayaran)
    {
        $barang_sampai = RincianPembayaran::where('id_rincian_pembayaran', $id_rincian_pembayaran)->first();
        $barang_sampai->status = 'sampai';
        $barang_sampai->save();
        return redirect()->route('pesanan_saya');
    }

    public function laporan_admin()
    {
        $data = [
            'user' => DB::table('users')->where('status', '=', 'toko')->count(),
            'produk' => DB::table('produk')->select('id_produk as produk')->count(),
            'transaksi' => DB::table('rincian_pembayaran')->select(DB::raw('SUM(jumlah_pembayaran) as total'))->first()
        ];

        return view('halaman_admin.laporan.laporan_admin', $data);
    }

    public function laporan_toko()
    {
        $laporan_toko = DB::table('faktur')->leftjoin('pembayaran', 'faktur.id_pay', '=', 'pembayaran.id_pay')->leftjoin('rincian_pembayaran', 'faktur.id_rincian_pembayaran', '=', 'rincian_pembayaran.id_rincian_pembayaran')->leftjoin('produk', 'rincian_pembayaran.id_produk', '=', 'produk.id_produk')->leftjoin('users', 'faktur.id_user', '=', 'users.id')
            ->leftJoin('kota', 'faktur.id_kota', '=', 'kota.id_kota')->leftjoin('kurir', 'faktur.id_kurir', '=', 'kurir.id_kurir')->where('produk.distributor_produk', Auth::user()->id)->where('rincian_pembayaran.status', 'sampai')
            ->select(
                'pembayaran.tipe_pembayaran as t_pembayaran',
                'rincian_pembayaran.*',
                'users.name as user_nama',
                'users.email as user_email',
                'produk.nama_produk as nm_produk',
                'produk.photo as p_produk',
                'kurir.nama_kurir',
                'kurir.harga as harga_kurir',
                'kota.*',
                'produk.photo as p_produk',
                'faktur.tanggal_bayar',
                'faktur.konfirmasi'
            )
            ->get();
        // dd($laporan_toko);
        return view('halaman_toko.laporan.laporan_toko', compact('laporan_toko'));
    }

    public function cari(Request $request)
    {
        $cari = DB::table('faktur')->leftjoin('pembayaran', 'faktur.id_pay', '=', 'pembayaran.id_pay')->leftjoin('rincian_pembayaran', 'faktur.id_rincian_pembayaran', '=', 'rincian_pembayaran.id_rincian_pembayaran')->leftjoin('produk', 'rincian_pembayaran.id_produk', '=', 'produk.id_produk')->leftjoin('users', 'faktur.id_user', '=', 'users.id')
            ->leftJoin('kota', 'faktur.id_kota', '=', 'kota.id_kota')->leftjoin('kurir', 'faktur.id_kurir', '=', 'kurir.id_kurir')->where('produk.distributor_produk', Auth::user()->id)->where('rincian_pembayaran.status', 'sampai')
            ->select(
                'pembayaran.tipe_pembayaran as t_pembayaran',
                'rincian_pembayaran.*',
                'users.name as user_nama',
                'users.email as user_email',
                'produk.nama_produk as nm_produk',
                'produk.photo as p_produk',
                'kurir.nama_kurir',
                'kurir.harga as harga_kurir',
                'kota.*',
                'produk.photo as p_produk',
                'faktur.tanggal_bayar',
                'faktur.konfirmasi'
            );
        if ($request->periode) {
            $hasil = $cari->whereMonth('faktur.tanggal_bayar', [$request->periode]);
        } else {
            $hasil = $cari;
        }

        $laporan_toko = $hasil->get();
        return view('halaman_toko.laporan.laporan_toko', compact('laporan_toko'));
    }
}
