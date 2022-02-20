@extends('template.admin')

@section('title', 'Edit Akun Admin')

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Admin</h1>
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
                        Form Admin
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('edit', $edit->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="1" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="1"
                                required>
                            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="1" class="form-label">Email</label>
                            <input type="text" name="email" value="{{ $edit->email }}" class="form-control" id="1"
                                required>
                            @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">No Hp</label>
                            <input type="number" name="nohp" value="{{ $edit->nohp }}" class="form-control" id="1"
                                required>
                            @error('nohp')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Alamat</label>
                            <input type="text" name="alamat" value="{{ $edit->alamat }}" class="form-control" id="1"
                                required>
                            @error('nohp')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Status Akun</label>
                            <select class="form-control" name="status" aria-label="Default select example">
                                <option value="{{ $edit->status }}">
                                    {{ $edit->status }}
                                </option>
                                <option value="admin">Admin</option>
                                <option value="toko">Toko</option>
                            </select>
                            @error('status')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('admin') }}" class="btn btn-warning">back</a>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
            </div>
        </section>

    </div>
@endsection
