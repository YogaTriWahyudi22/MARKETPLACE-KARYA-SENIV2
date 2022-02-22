@extends('template.admin')

@section('title', 'Jenis Produk Karya Seni')

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
                        <h1>Kelola Jenis Produk Karya Seni</h1>
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
                    <a href="{{ route('jenis_tambah') }}" class="btn btn-primary">Tambah Produk Karya Seni</a>
                </div>
                <!-- /.card-header -->
                <div class="table-responsive">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>Jenis Karya Seni</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($index_jenis as $index)
                                    <tr class="text-center">
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $index->jenis_karya_seni }}</td>
                                        <td>
                                            <a href="{{ route('jenis_edit', $index->id_jenis) }}"
                                                class="btn btn-sm btn-block btn-info mb-2">Edit</a>
                                            <form method="POST" action="{{ route('jenis_hapus', $index->id_jenis) }}">
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
