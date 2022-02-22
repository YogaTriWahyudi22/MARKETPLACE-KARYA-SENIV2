@extends('template.admin')

@section('title', 'Produk')

@section('admin')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                @if (session()->has('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>

                @elseif(session()->has('berhasil'))
                    <div class="alert alert-primary">
                        {{ session('berhasil') }}
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kelola Produk Karya Seni</h1>
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
                    <a href="{{ route('produk_tambah') }}" class="btn btn-primary">Tambah Produk Karya Seni</a>

                    <a href="{{ route('jenis_produk_karya_seni') }}" class="btn btn-success">Kelola Jenis Produk Karya
                        Seni</a>
                </div>
                <!-- /.card-header -->
                <div class="table-responsive">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Produk</th>
                                    <th>Gambar Produk</th>
                                    <th>Jenis Produk Karya Ilmiah</th>
                                    <th>Jumlah Produk</th>
                                    <th>Harga</th>
                                    <th>Distributor</th>
                                    <th>Diskon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $p)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $p->nama_produk }}</td>
                                        <td><img src="{{ url('gambar', $p->photo) }}" width="100"></td>
                                        <td>{{ $p->jenis_karya }}</td>
                                        <td>{{ $p->jumlah_produk }}</td>
                                        <td>Rp.{{ number_format($p->harga) }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>Rp.{{ number_format($p->diskon) }}</td>
                                        <td>
                                            <a href="{{ route('produk_edit', $p->id_produk) }}"
                                                class="btn btn-sm btn-block btn-info mb-2">Edit</a>
                                            <form method="POST" action="{{ route('produk_delete', $p->id_produk) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-block btn-danger mb-2">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
