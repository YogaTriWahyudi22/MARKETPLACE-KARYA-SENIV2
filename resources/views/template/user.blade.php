<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Toko Online </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('halaman_user.pembagian_template.css')
</head>

<body>
    {{-- @php
        use App\Http\Controllers\PesananController;
        $total = PesananController::PesananItem();
        @endphp --}}
    <hr>
    <h2 style="text-align: center;"><b>MarketPlace Karya Seni Sumatera Barat</h2>
    <h3 style="text-align: center;"><b>MarketPlace Karya Seni Sumatera Barat</h3>
    <hr>
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        @include('halaman_user.pembagian_template.header')

        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Offset MEnu -->
            @if (Auth::user())

                <div class="offsetmenu">
                    <div class="offsetmenu__inner">
                        <div class="offsetmenu__close__btn">
                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>


                        <div class="off__contact">
                            <!-- Profile Setting -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('gambar/admin.jpg') }}" alt="User profile picture">
                                    </div>

                                    <p class="text-muted text-center">{{ Auth::user()->name }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Name : </b> <a class="float-right">{{ Auth::user()->name }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>email : </b> <a class="float-right">{{ Auth::user()->email }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>No Telephone : </b> <a
                                                class="float-right">{{ Auth::user()->nohp }}</a>
                                        </li>
                                        </li>
                                    </ul>
                                    {{-- <a href="{{ Route('edit_profile', $user->id) }}" class="btn btn-primary">Edit
                                    Profile</a>
                                </form> --}}
                                </div>
                            </div>
                            {{-- @include('halaman_user.pembagian_template.footer') --}}
                            <!-- END Setting -->

                        </div>

                        <div class="logout">
                            <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                                @method('POST')
                            </form>
                        </div>
                    </div>
                </div>

            @endif
        </div>
        <div class="content"><br>
            @yield('content')

        </div>

        <!-- Footer Area -->
        @include('halaman_user.pembagian_template.footer')
        <!-- End Footer Area -->
    </div>

    @include('halaman_user.pembagian_template.script')

</body>

</html>
