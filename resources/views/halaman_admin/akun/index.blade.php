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
                    <h1>Kelola Akun</h1>
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

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route('tambah') }}" class="btn btn-primary">Tambah Akun Admin</a>
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $us)

                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $us->name }}</td>
                                    <td>{{ $us->email }}</td>
                                    <td>{{ $us->nohp }}</td>
                                    <td>{{ $us->alamat }}</td>
                                    <td>{{ $us->status }}</td>
                                    <td>
                                        <a href="{{ route('edit', $us->id) }}"
                                            class="btn btn-sm btn-block btn-info mb-2">Edit</a>

                                        <form method="POST" action="{{ route('delete', $us->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-block btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection
