@extends('template.user')

@section('content')
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('asset/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Pesanan selesai dibayar</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Preview</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- cart-main-area start -->
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ route('faktur') }}" class="btn btn-primary" target="_blank">Faktur</a>
                    <div class="table-content table-responsive">
                        <br>
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">No</th>
                                    <th class="product-remove">Nama Produk</th>
                                    <th class="product-thumbnail">Alamat</th>
                                    <th class="product-thumbnail">Distributor</th>
                                    <th class="product-thumbnail">Tipe Pembayaran</th>
                                    <th class="product-thumbnail">Bukti Pembayaran</th>
                                    <th class="product-diskount">Konfirmasi Pembayaran</th>
                                    <th class="product-diskount">Kondisi Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan_saya as $pesan)
                                    <tr>
                                        <td class="product-thumbnail"><span>{{ $loop->iteration }}</span></td>

                                        <td class="product-subtotal"><span
                                                class="amount">{{ $pesan->nama_produk }}</span></td>
                                        <td class="product-subtotal"><span
                                                class="amount">{{ $pesan->kota }}</span>
                                        <td class="product-subtotal"><span
                                                class="amount">{{ $pesan->konfirmasi }}</span>
                                        </td>
                                        <td class="product-name"><span
                                                class="amount">{{ $pesan->tipe_pembayaran }}</span>
                                        </td>
                                        <td class="product-name"><span><img
                                                    src="{{ asset('gambar') }}/{{ $pesan->photo }}"
                                                    alt="Bukti Pembayaran" /></span></td>
                                        <td class="product-name"><span class="amount">
                                                @if ($pesan->status == 'pending')
                                                    Tunggu konfirmasi dari Toko
                                                @else
                                                    {{ $pesan->status }}
                                                @endif

                                            </span></td>
                                        <td>
                                            @if ($pesan->status == 'konfirmasi')
                                                <a href="{{ route('barang_sampai', $pesan->id_rincian_pembayaran) }}"
                                                    class="btn btn-primary">Barang
                                                    Sampai </a>
                                            @else
                                                {{ $pesan->status }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
