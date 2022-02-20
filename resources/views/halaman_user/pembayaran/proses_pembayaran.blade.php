@extends('template.user')

@section('content')
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('asset/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Preses Pembayaran</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{ Route('pesanan') }}">Pemesanan</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Preview</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- cart-main-area start -->
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">List</th>
                                    <th class="product-name">Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $pesanan = 0;
                                    $total = 0;
                                    $total_akhir = 0;
                                @endphp
                                {{-- @dd($proses); --}}
                                @foreach ($proses as $p)
                                    @php
                                        $harga_barang = $total + $p->harga * $p->kuantiti - $p->diskon * $p->kuantiti;
                                        $total_akhir += $total + $p->harga * $p->kuantiti - $p->diskon * $p->kuantiti;
                                    @endphp
                                @endforeach


                                <tr>

                                    <td class="product-thumbnail"><span>Total</span></td>
                                    <td class="product-name"><span id="total_harga">Rp
                                            {{ number_format($total_akhir) }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container row g-3">

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label mt-2">Pilih Kurir</label>
                                    <input type="hidden" name="jumlah_pembayaran" id="total_harga1"
                                        value="{{ $harga_barang }}">
                                    <select id="pilih-kurir" name="id_kurir" class="form-control">
                                        @php
                                            $kurir = DB::table('kurir')->get();
                                        @endphp
                                        <option data-harga="0" id="kurir_none">Pilih Kurir</option>
                                        @foreach ($kurir as $k)
                                            <option id="{{ $k->id_kurir }}" data-harga="{{ $k->harga }}"
                                                data-kurir="jne" value="{{ $k->id_kurir }}">
                                                {{ $k->nama_kurir }} ===
                                                {{ number_format($k->harga) }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" placeholder="Alamat Lengkap" name="kota"
                                    id="floatingTextarea"></textarea>
                            </div><br>

                            <div class="mb-1">
                                <label for="1" class="form-label">Metode Pembayaran</label>
                                <select id="pilih" onchange="cek()" name="tipe_pembayaran" class="form-control">
                                    <option selected>Pilih Metode Pembayaran</option>
                                    <option value="cash">Cash On Delevery</option>
                                    <option value="transfer">Transfer</option>
                                </select><br>
                                <div id="hasil"></div>

                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Kirim Bukti Pembayaran</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Nomor Rekening : 12345678910</p><br>
                                                <p>Valid Number : 22/03/94</p><br>
                                                <p>Kirim Bukti pembayaran</p><br>
                                                <input type="file" name="photo"><br>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                    aria-label="Close">SAVE</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div><br>
                            </div>

                            <button type="submit" class="btn btn-primary">checkout</button>
                        </form>
                        <script>
                            let pilih = document.getElementById("pilih-kurir")

                            pilih.addEventListener("change", (e) => {
                                let id = e.target.value
                                let kurir = document.getElementById(id)
                                harga = parseInt(kurir.dataset.harga)
                                // untuk total
                                let total = document.getElementById("total_harga")
                                total = total.innerText
                                console.log(total);
                                total = total.split("Rp ")[1].split(",").join("")
                                total = parseInt(total) + harga
                                document.getElementById("total_harga").innerText = `Rp.${new Intl.NumberFormat().format(total)}`

                                // untuk kirim ke database

                                let insert = document.getElementById("total_harga1")
                                insert = insert.value
                                harga = parseInt(kurir.dataset.harga)
                                insert1 = parseInt(insert) + harga
                                document.getElementById("total_harga1").value = insert1

                            })


                            function cek() {
                                var tes = document.getElementById("pilih").value;
                                if (tes == 'transfer') {
                                    $('#modal-default').modal('show');
                                } else {
                                    document.getElementById("hasil").innerHTML = ("");
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
