<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\RincianPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function proses_pembayaran()
    {

        $proses = Pesanan::leftjoin('produk', 'pesanan.id_produk', '=', 'produk.id_produk')->leftjoin('users', 'pesanan.id_user', 'users.id')
            ->select('pesanan.*', 'users.name as nama_user', 'produk.*')->where('pesanan.id_user', Auth::user()->id)->get();
        // $proses =  Pesanan::where('id_user', Auth::user()->id)->get();
        return view('halaman_user.pembayaran.proses_pembayaran', compact('proses'));
    }

    public function checkout(Request $request)
    {
        // dd($request->all());
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $time = date("h:i:s");
        $kota = [];
        $pembayaran = [];
        $rincian_pembayaran = [];
        $faktur = [];
        $userId = Pesanan::leftjoin('produk', 'pesanan.id_produk', '=', 'produk.id_produk')->leftjoin('users', 'pesanan.id_user', '=', 'users.id')->select('pesanan.*', 'produk.harga')->where('id_user', Auth::user()->id)->get();
        // pembayaran dengan status COD 
        foreach ($userId  as $key => $value) {
            $kota[] = [
                'kota' => $request->kota
            ];

            $pembayaran[] = [
                'tipe_pembayaran' => $request->tipe_pembayaran,
            ];
        }
        // Pelanggan bayar Via Transfer
        if ($request->tipe_pembayaran == 'transfer') {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $photo = $request->file('photo');
            $photo_name = time() . '.' . $photo->extension();
            $photo->move(public_path('gambar'), $photo_name);
            foreach ($userId  as $key => $value) {
                $rincian_pembayaran[] = [
                    'id_produk' => $value['id_produk'],
                    'kuantiti'  => $value['kuantiti'],
                    'status' => 'pending',
                    'photo' => $photo_name,
                    'jumlah_pembayaran' => $value['harga'],
                    'waktu_pemesanan' => $time,
                ];
            }
        }
        // Pelanggan bayar Via Transfer !!

        // Pelanggan bayar Via COD
        else {
            foreach ($userId  as $key => $value) {
                $rincian_pembayaran[] = [
                    'id_produk' => $value['id_produk'],
                    'kuantiti'  => $value['kuantiti'],
                    'status' => 'pending',
                    'jumlah_pembayaran' => $value['harga'],
                    'waktu_pemesanan' => $time,
                ];
            }
        }
        // Pelanggan bayar Via COD!!

        // insert table database kota
        DB::table('kota')->insert($kota);
        // mengambil id_kota 
        $id = DB::getPDO()->lastInsertId();
        // insert table database pembayaran
        DB::table('pembayaran')->insert($pembayaran);
        // mengambil id_pembayaran
        $id_pembayaran = DB::getPDO()->lastInsertId();
        // insert table database Rincian Pembayaran
        DB::table('rincian_pembayaran')->insert($rincian_pembayaran);

        $rincian_pembayaran = RincianPembayaran::where('waktu_pemesanan', $time)->get();
        foreach ($rincian_pembayaran as $key => $lapor) {

            $faktur[] = [
                'id_pay' => $id_pembayaran,
                'id_user' => Auth::user()->id,
                'id_kota' => $id,
                'id_kurir' => $request->id_kurir,
                'id_rincian_pembayaran' => $lapor['id_rincian_pembayaran'],
                'tanggal_bayar' => $date,
                'konfirmasi' => 'pending',

            ];
        }

        DB::table('faktur')->insert($faktur);
        DB::table('pesanan')->where('id_user', '=', Auth::user()->id)->delete();
        return redirect()->route('home');
    }

    public function konfirmasi_pembayaran()
    {
        $proses = Faktur::leftjoin('rincian_pembayaran', 'faktur.id_rincian_pembayaran', '=', 'rincian_pembayaran.id_rincian_pembayaran')->leftjoin('produk', 'rincian_pembayaran.id_produk', '=', 'produk.id_produk')
            ->leftjoin('users', 'faktur.id_user', '=', 'users.id')->leftjoin('pembayaran', 'faktur.id_pay', '=', 'pembayaran.id_pay')
            ->select('produk.nama_produk', 'produk.distributor_produk', 'produk.harga', 'produk.photo as photo_produk', 'rincian_pembayaran.kuantiti', 'rincian_pembayaran.*', 'pembayaran.tipe_pembayaran', 'users.name as nama_pelanggan')->get();
        return view('halaman_admin.pembayaran.konfirmasi_pembayaran', compact('proses'));
    }

    public function pembayaran_toko()
    {
        $proses = Faktur::leftjoin('rincian_pembayaran', 'faktur.id_rincian_pembayaran', '=', 'rincian_pembayaran.id_rincian_pembayaran')->leftjoin('produk', 'rincian_pembayaran.id_produk', '=', 'produk.id_produk')
            ->leftjoin('users', 'faktur.id_user', '=', 'users.id')->leftjoin('pembayaran', 'faktur.id_pay', '=', 'pembayaran.id_pay')
            ->select('produk.nama_produk', 'produk.harga', 'produk.photo as photo_produk', 'rincian_pembayaran.kuantiti', 'rincian_pembayaran.*', 'pembayaran.tipe_pembayaran', 'users.name as nama_pelanggan')->get();
        return view('halaman_toko.pembayaran.pembayaran', compact('proses'));
    }


    public function konfirmasi($id_rincian_pembayaran)
    {
        $faktur = Faktur::leftjoin('rincian_pembayaran', 'faktur.id_rincian_pembayaran', '=', 'rincian_pembayaran.id_rincian_pembayaran')->where('rincian_pembayaran.id_rincian_pembayaran', $id_rincian_pembayaran)->first();
        $faktur->konfirmasi = Auth::user()->name;
        $faktur->save();

        $update = RincianPembayaran::where('rincian_pembayaran.id_rincian_pembayaran', $id_rincian_pembayaran)->first();
        $update->status = 'konfirmasi';
        $update->save();
        return redirect()->route('konfirmasi_pembayaran');
    }

    public function gagal($id_rincian_pembayaran)
    {
        $gagal_faktur = Faktur::leftjoin('rincian_pembayaran', 'faktur.id_rincian_pembayaran', '=', 'rincian_pembayaran.id_rincian_pembayaran')->where('rincian_pembayaran.id_rincian_pembayaran', $id_rincian_pembayaran)->first();
        $gagal_faktur->konfirmasi = Auth::user()->name;
        $gagal_faktur->save();

        $gagal = RincianPembayaran::where('rincian_pembayaran.id_rincian_pembayaran', $id_rincian_pembayaran)->first();
        $gagal->status = 'gagal';
        $gagal->save();
        return redirect()->route('konfirmasi_pembayaran');
    }
}
