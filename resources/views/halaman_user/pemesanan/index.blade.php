@extends('template.user')

@section('content')
    <!-- End Offset Wrapper -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('asset/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Penyewaan</h2>
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
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Gambar</th>
                                    <th class="product-thumbnail">Distributor</th>
                                    <th class="product-thumbnail">Nama Pemesan</th>
                                    <th class="product-thumbnail">Konfirmasi Admin</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product-price">Diskon</th>
                                    <th class="product-thumbnail">Kuantiti pemesanan</th>
                                    <th class="product-thumbnail">Total</th>
                                    <th class="product-remove">Hapus</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($pemesanan as $pesan)
                                    @php
                                        $pelanggan = DB::table('users')
                                            ->where('id', '=', $pesan->id_user)
                                            ->select('users.name as nama_pelanggan')
                                            ->first();
                                    @endphp
                                    <tr>
                                        <td class="product-thumbnail"><span><img
                                                    src="{{ asset('gambar') }}/{{ $pesan->photo }}"
                                                    alt="product img" /></span></td>
                                        <td class="product-diskount"><span
                                                class="amount">{{ $pesan->nama_distributor }}</span>
                                        </td>
                                        <td class="product-diskount"><span
                                                class="amount">{{ $pelanggan->nama_pelanggan }}</span>
                                        </td>
                                        @if ($pesan->status == 'pending')
                                            <td class="product-diskount">Tunggu Konfirmasi Dari Admin<span
                                                    class="amount">
                                                </span></td>
                                        @else
                                            <td class="product-diskount">{{ $pesan->status }}<span class="amount">
                                        @endif
                                        <td class="product-diskount"><span
                                                class="amount">{{ number_format($pesan->harga) }} /
                                                {{ $pesan->satuan }}</span></td>
                                        <td class="product-diskount"><span
                                                class="amount">{{ number_format($pesan->diskon) }}/
                                                {{ $pesan->satuan }}</span></td>
                                        <td class="product-diskount"><span
                                                class="amount">{{ $pesan->kuantiti }}</span>
                                        </td>
                                        <td>
                                            {{ number_format($pesan->harga * $pesan->kuantiti - $pesan->diskon * $pesan->kuantiti) }}
                                        </td>
                                        <td class="product-remove"><a
                                                href="{{ route('hapus_pesanan', $pesan->id_pesanan) }}">X</a></td>
                                    </tr>
                                    @php
                                        $total = $total + $pesan->harga * $pesan->kuantiti - $pesan->diskon * $pesan->kuantiti;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12">

                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart_totals">
                                <h2>Cart Totals</h2>
                                <table>
                                    <tbody>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">Rp.
                                                        {{ number_format($total) }}</span></strong>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="wc-proceed-to-checkout">
                                                    @if (isset($pesan->status))
                                                        @if ($button->status == 'konfirmasi')
                                                            <a href="{{ route('proses_pembayaran') }}">
                                                                Pembayaran</a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
