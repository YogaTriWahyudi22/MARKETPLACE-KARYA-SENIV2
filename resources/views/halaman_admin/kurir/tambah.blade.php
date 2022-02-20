@extends('template.admin')

@section('title', 'Tambah Kurir')

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Kurir</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Form Kurir
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('kurir_tambah') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="1" class="form-label">Nama Kurir</label>
                            <input type="text" name="nama_kurir" class="form-control" id="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" id="1" required>
                        </div>
                        <p>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('kurir') }}" class="btn btn-warning">back</a>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
    </div>
@endsection
