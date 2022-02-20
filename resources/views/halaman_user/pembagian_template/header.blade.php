@if (Auth::user())
    @php
        $pesan = DB::table('pesanan')->count();
    @endphp
    <header id="header" class="htc-header header--3 bg__white" style="background-color: #0fc9e7">
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    </div>
                    <!-- Start MAinmenu Ares -->
                    <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                        <nav class="mainmenu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="{{ route('home') }}">Home</a></li>
                                <li class="drop"><a href="{{ route('pesanan_saya') }}">Pesanan Saya</a>
                                </li>
                                {{-- <li class="drop"><a href="{{route('sampai')}}">Pesanan Selesai</a></li> --}}
                                {{-- <li class="drop"><a href="{{ url('kontak_home') }}">Kontak</a></li> --}}
                            </ul>
                        </nav>
                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li class="drop"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="drop"><a href="{{ route('pesanan_saya') }}">Pesanan
                                            Saya</a>
                                    </li>
                                    {{-- <li class="drop"><a href="{{route('sampai')}}">Pesanan Selesai</a></li> --}}
                                    {{-- <li class="drop"><a href="{{ url('kontak_home') }}">Kontak</a></li> --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End MAinmenu Ares -->
                    <div class="col-md-5 col-sm-4 col-xs-3">
                        <ul class="menu-extra">
                            <li class="search search__open hidden-xs"></li>
                            <a href="{{ route('pesanan') }}"><span
                                    class="ti-shopping-cart"></span>({{ $pesan }})</a>
                            <li class="toggle__menu hidden-xs hidden-sm"><span>
                                    {{ Auth::user()->name }}
                                </span></li>
                        </ul>
                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
@else
    <header id="header" class="htc-header header--3 bg__white" style="background-color: #0fc9e7">
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    </div>
                    <!-- Start MAinmenu Ares -->
                    <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                        <nav class="mainmenu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                {{-- <li class="drop"><a href="{{ route('halaman_awal') }}">Home</a></li> --}}
                                {{-- <li class="drop"><a href="{{ route('pesanan_saya') }}">Pesanan Saya</a>
                        </li> --}}
                                {{-- <li class="drop"><a href="{{route('sampai')}}">Pesanan Selesai</a></li> --}}
                                {{-- <li class="drop"><a href="{{ url('kontak_home') }}">Kontak</a></li> --}}
                            </ul>
                        </nav>
                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    {{-- <li class="drop"><a href="{{ route('halaman_awal') }}">Home</a></li> --}}
                                    {{-- <li class="drop"><a href="{{ route('pesanan_saya') }}">Pesanan
                                    Saya</a>
                            </li> --}}
                                    {{-- <li class="drop"><a href="{{route('sampai')}}">Pesanan Selesai</a></li> --}}
                                    {{-- <li class="drop"><a href="{{ url('kontak_home') }}">Kontak</a></li> --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End MAinmenu Ares -->
                    <div class="col-md-5 col-sm-4 col-xs-3">
                        <ul class="menu-extra">
                            <li class="search search__open hidden-xs"></li>
                            <li><a href="{{ route('login') }}"><span class="ti-user"> Daftar/Masuk</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
@endif
