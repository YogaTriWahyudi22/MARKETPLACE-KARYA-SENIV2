@extends('template.admin')

@section('title', 'Laporan Admin')

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
                        <h1>Laporan Akhir</h1>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Rekapitulasi Laporan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Jumlah Toko Terdaftar</th>
                                        <th scope="col" class="text-center">Jumlah Produk Semua Toko</th>
                                        <th scope="col" class="text-center">Jumlah Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $user }}</td>
                                        <td class="text-center">{{ $produk }}</td>
                                        <td class="text-center">Rp.{{ number_format($transaksi->total) }}</td>
                                    </tr>


                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
