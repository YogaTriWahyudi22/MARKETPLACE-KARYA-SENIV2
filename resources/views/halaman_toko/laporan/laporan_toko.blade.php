@extends('template.admin')

@section('title', 'Laporan Toko')

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @if (session()->has('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-sm-6">
                        <h1>Laporan Akhir Penjualan Toko</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">

                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('m');
                    @endphp
                    <form action="{{ route('cari') }}" method="POST">
                        @csrf
                        <div class="row float-center">

                            <select class="form-control" name="periode" aria-label="Default select example">
                                @php
                                    $bulan = ['Januari' => '1', 'Februari' => '2', 'Maret' => '3', 'April' => '4', 'Mei' => '5', 'Juni' => '6', 'Juli' => '7', 'Agustus' => '8', 'September' => '9', 'Oktober' => '10', 'November' => '11', 'Desember' => '12'];
                                @endphp
                                <option value="{{ $tgl }}">Pilih Bulan</option>
                                @foreach ($bulan as $b => $value_bulan)
                                    <option value="{{ $value_bulan }}">{{ $b }} </option>
                                @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary my-2">Cari</button>

                        </div>
                    </form>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Gambar Produk</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Tipe Pembayaran</th>
                                        <th scope="col">Bukti Pembayaran</th>
                                        <th scope="col">Tanggal Bayar</th>
                                        <th scope="col">Nama Kurir</th>
                                        <th scope="col">Ongkir</th>
                                        <th scope="col">Jumlah Pembayaran</th>
                                        <th scope="col">Dikonfirmasi</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan_toko as $p)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $p->user_nama }}</td>
                                            <td>{{ $p->user_email }}</td>
                                            <td>{{ $p->nm_produk }}</td>
                                            <td><img src="{{ asset('gambar') }}/{{ $p->p_produk }}"
                                                    class="img_thumbnail" alt="gambar Produk" width="70"></td>
                                            <td>{{ $p->kota }}</td>
                                            <td>{{ $p->t_pembayaran }}</td>
                                            <td><img src="{{ asset('gambar') }}/{{ $p->photo }}" width="70"
                                                    alt="Bukti Pembayaran"></td>
                                            <td>{{ $p->tanggal_bayar }}</td>
                                            <td>{{ $p->nama_kurir }}</td>
                                            <td>{{ number_format($p->harga_kurir) }}</td>
                                            <td>{{ number_format($p->jumlah_pembayaran) }}</td>
                                            <td>{{ $p->konfirmasi }}</td>
                                            <td>{{ $p->status }}</td>
                                        </tr>
                                    @endforeach
                                    </tfoot>
                            </table>

                            <div class="float-right">
                                Penanggung Jawab <br>
                                admin
                                <div class="mt-5">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
