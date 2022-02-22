@extends('template.user')

@section('content')
    <section class="categories-slider-area bg__white">
        <div class="container">
            <div class="row">
                <!-- Start Left Feature -->
                <div class="col-md-9 col-lg-12 col-sm-8 col-xs-12">
                    <!-- Start Slider Area -->
                    <div class="slider__container slider--one">
                        <div class="slider__activation__wrap owl-carousel owl-theme">
                            <div class="slide slider__full--screen slider-height-inherit slider-text-right"
                                style="background: rgba(0, 0, 0, 0) url({{ asset('gambar/banner.jpg') }}) no-repeat scroll center center / cover ; width:50;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                            <div class="slider__inner">
                                                <div class="slider__btn">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br>
    </section>
    <section class="htc__blog__area bg__white pb--130">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title section__title--2 text-center">
                        <h2 class="title__line">Pemesana Produk </h2>
                        </p>
                    </div>
                    {{-- <p>Kota Padang </p> --}}

                    <div class="row">
                        <h2 class="title__line">
                            <center>
                                <div class="alert alert-info" role="alert">

                                    Lokasi Toko : {{ $lokasi->lokasi }} <a href="{{ route('home') }}"
                                        class="btn btn-danger">Back</a>
                                </div>
                            </center>
                        </h2>
                    </div><!-- /.row -->


                </div>
                <br> <br> <br>

                <div class="row">
                    <div class="blog__wrap clearfix mt--60 xmt-30">
                        <div class="row">
                            @foreach ($produk as $pr)
                                <div class="col-sm- col-md-4">
                                    <div class="thumbnail">
                                        <img src="{{ asset('gambar') }}/{{ $pr->photo }}" alt="...">
                                        <div class="caption">
                                            <h5 class="card-title">Produk : {{ $pr->nama_produk }}</h5>
                                            <p>
                                            <h5 class="card-title">Harga : {{ number_format($pr->harga) }}
                                            </h5>
                                            <br>
                                            <h5 class="card-title">Stok Produk : {{ $pr->jumlah_produk }}
                                            </h5>
                                            <br>
                                            <h5 class="card-title">Distributor : {{ $pr->name }}
                                            </h5>
                                            <h5 class="card-title">Lokasi Toko : {{ $pr->alamat }}
                                            </h5>
                                            <br>
                                            @if ($pr->jumlah_produk == 0)
                                            @else

                                                <a href="{{ route('detail', $pr->id_produk) }}"
                                                    class="btn btn-primary">Detail
                                                    Produk & Pemesanan</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
    </section>
@endsection
