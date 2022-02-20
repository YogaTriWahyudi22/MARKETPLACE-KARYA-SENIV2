@extends('template.admin')

@section('title', 'Konfirmasi Pemesanan')

@section('admin')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Konfirmasi Pemesanan</h1>
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
                                <th scope="col">Kuantiti</th>
                                <th scope="col">Nama Pemesann</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($pesan as $konfir)
                                <tr class="text-center">
                                    <th>{{ $loop->iteration }}</th>
                                    <td><img src="{{ url('gambar', $konfir->photo) }}" width="100"></td>
                                    <td>{{ $konfir->nama_produk }}</td>
                                    <td>{{ $konfir->kuantiti }}</td>
                                    <td>{{ $konfir->nama_user }}</td>
                                    <td>{{ number_format($konfir->harga) }}</td>
                                    <td>{{ number_format($konfir->harga * $konfir->kuantiti) }}</td>
                                    <td>
                                        @if ($konfir->status == 'pending')
                                            <a href="{{ route('konfirmasi', $konfir->id_pesanan) }}"
                                                class="btn btn-info">Konfirmasi</a>
                                            <a href="{{ route('gagal', $konfir->id_pesanan) }}"
                                                class="btn btn-danger">gagal</a>
                                        @else
                                            {{ $konfir->status }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
