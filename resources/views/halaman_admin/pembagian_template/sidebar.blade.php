<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/dist/img/AdminLTELogo.png') }}" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->status }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('gambar') }}/{{ Auth::user()->photo }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info text-white">
                <a href="" class="d-block">
                    {{ Auth::user()->name }} </a>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                @if (Auth::user()->status == 'admin')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin') }}" class="nav-link mr-1">
                            &nbsp;<i class="fas fa-users mr-2"></i>
                            <p>
                                Akun
                            </p>
                        </a>
                    </li>


                    <li class="nav-item has-treeview">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Menampilkan Banner
                            </p>
                        </a>
                    </li> --}}

                    <li class="nav-item">
                        <a href="{{ route('kurir') }}" class="nav-link">
                            <i class="fas fa-people-carry ml-1 mr-2"></i>
                            <p>
                                Kelola Kurir
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('konfirmasi_pembayaran') }}" class="nav-link ml-1">
                            <i class="far fa-money-bill-alt"></i>
                            <p class="ml-2">Konfirmasi Pembayaran
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('laporan_admin') }}" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Laporan Akhir
                            </p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->status == 'toko')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('produk') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Kelola Produk
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('konfirmasi_pesanan') }}" class="nav-link ml-1">
                            <i class="fas fa-cart-arrow-down"></i>
                            <p class="ml-2">
                                Konfirmasi Pemesanan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pembayaran_toko') }}" class="nav-link ml-1">
                            <i class="far fa-money-bill-alt"></i>
                            <p class="ml-2">Pembayaran
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('laporan_toko') }}" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p class="ml-1">Laporan Terakhir Toko
                            </p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
