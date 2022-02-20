@extends('template.admin')

@section('title', 'Tambah Produk')

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Produk Karya Seni</h1>
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
                        Form Produk Karya Seni
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk_tambah') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label><br>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Input Nama Produk"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Satuan Produk</label><br>
                            <input type="text" name="satuan" class="form-control" placeholder="Input Satuan Produk"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label><br>
                            <textarea name="deskripsi" id="" cols="30" class="form-control" rows="10"
                                placeholder="Input Deskripsi" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Karya Seni</label><br>
                            <select class="form-control" name="jenis_karya_seni" aria-label="Default select example">
                                <option selected>Pilih Jenis Karya Seni</option>
                                @foreach ($tambah_jenis as $jenis)
                                    <option value="{{ $jenis->id_jenis }}">{{ $jenis->jenis_karya_seni }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah Produk</label><br>
                            <input type="number" name="jumlah_produk" class="form-control"
                                placeholder="Input Jumlah Produk" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga</label><br>
                            <input type="number" name="harga" class="form-control" placeholder="Input Jumlah harga"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Diskon</label><br>
                            <input type="number" name="diskon" class="form-control" placeholder="Input Jumlah diskon"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Photo</label><br>
                            <input type="file" name="photo" id="muncul-gambar" onchange="gambarProduk();">
                        </div>

                        <img id="produk-gambar" class="mr-5" style="width: 150px; height: 200px;"
                            alt="Gambar Produk" />
                        <p>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('produk') }}" class="btn btn-warning">back</a>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
            </div>
        </section>

    </div>
    <script>
        function gambarProduk() {
            document.getElementById("produk-gambar").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("muncul-gambar").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("produk-gambar").src = oFREvent.target.result;
            };
        };
    </script>

@endsection
