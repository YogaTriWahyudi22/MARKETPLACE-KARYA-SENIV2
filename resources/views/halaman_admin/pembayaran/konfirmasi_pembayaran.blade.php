@extends('template.admin')

@section('title', 'Konfirmasi Pembayaran')

@section('admin')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Konfirmasi Pembayaran</h1>
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

            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Dsitributor Produk</th>
                                <th scope="col">Kuantiti</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Tipe Pembayaran</th>
                                <th scope="col">Bukti Pembayaran</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($proses as $konfir)
                                @if ($konfir->status == 'pending')
                                    @php
                                        $distributor = DB::table('users')
                                            ->where('id', $konfir->distributor_produk)
                                            ->first();
                                        $total += $konfir->harga * $konfir->kuantiti;
                                    @endphp
                                    <tr class="text-center">
                                        <th>{{ $loop->iteration }}</th>
                                        <td><img src="{{ url('gambar', $konfir->photo_produk) }}" width="100"></td>
                                        <td>{{ $konfir->nama_produk }}</td>
                                        <td>
                                            {{ $distributor->name }}
                                        </td>
                                        <td>{{ $konfir->kuantiti }}</td>
                                        <td>{{ $konfir->nama_pelanggan }}</td>
                                        <td>{{ $konfir->tipe_pembayaran }}</td>
                                        <td><img src="{{ url('gambar', $konfir->photo) }}" width="100"
                                                alt="Bukti Pembayaran">
                                        </td>
                                        <td>{{ number_format($konfir->harga) }}</td>
                                        <td>
                                            @if ($konfir->status == 'pending')
                                                <a href="{{ route('pembayaran_konfirmasi', $konfir->id_rincian_pembayaran) }}"
                                                    class="btn btn-sm btn-block btn-info">Konfirmasi</a>
                                                <a href="{{ route('pembayaran_gagal', $konfir->id_rincian_pembayaran) }}"
                                                    class="btn btn-sm btn-block btn-danger">gagal</a>
                                            @else
                                                {{ $konfir->status }}
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td colspan="7">Total</td>
                                <td>Rp. {{ number_format($total) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
