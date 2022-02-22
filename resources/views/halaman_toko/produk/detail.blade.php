@extends('template.user')

@section('title', 'Detail Produk')

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('asset/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Detail Produk</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="">Home</a>
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
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('gambar') }}/{{ $detail_produk->photo }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"> Nama : {{ $detail_produk->nama_produk }}</h5><br>
                                    <p class="card-text">Jumlah Produk : {{ $detail_produk->jumlah_produk }} </p><br>
                                    <p class="card-text"> Harga Rp :
                                        {{ number_format($detail_produk->harga) }}/{{ $detail_produk->satuan }} </p><br>
                                    <p class="card-text"> Distributor : {{ $detail_produk->name }} </p><br>
                                    <p class="card-text">Deskripsi : {{ $detail_produk->deskripsi }} </p><br>
                                    @php
                                        $jenis_karya = DB::table('jenis_karya_seni')
                                            ->where('id_jenis', $detail_produk->jenis_karya_seni)
                                            ->first();
                                    @endphp
                                    <p class="card-text">Jenis Karya Seni : {{ $jenis_karya->jenis_karya_seni }}
                                    </p><br>
                                    <form action="{{ route('proses_pesanan') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_produk" value="{{ $detail_produk->id_produk }}">
                                        <label>Jumlah</label>
                                        <input type="text" class="form-control" name="kuantiti">
                                        <br>

                                        <button type="submit" class="btn btn-primary">Pesan</button>
                                        <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
