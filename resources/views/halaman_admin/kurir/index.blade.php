@extends('template.admin')

@section('title', 'Admin')

@section('admin')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                <div class="col-sm-6">
                    <h1>Kelola Kurir</h1>
                </div>
                <div class="row mb-2">
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
                    <a href="{{ route('kurir_tambah') }}" class="btn btn-primary">Tambah Kurir</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Nama Kurir</th>
                                <th>harga</th>
                                <th>Aksi </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($index as $i)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $i->nama_kurir }}</td>
                                    <td>Rp.{{ number_format($i->harga) }}</td>
                                    <td>
                                        <a href="{{ route('kurir_edit', $i->id_kurir) }}"
                                            class="btn btn-sm btn-block btn-info mb-2">Edit</a>
                                        <form action="{{ route('kurir_hapus', $i->id_kurir) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-block btn-danger">Hapus</button>
                                        </form>
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
