@extends('layout.admin')

@section('content')

    <body>
        <div class="text-center mb-4">
            <h1>Edit Data Pegawai</h1>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/update-data/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->nama }}">

                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenisKelamin">
                                            <option selected>Pilih Jenis Kelamin</option>
                                            <option value="cowo">Cowo</option>
                                            <option value="cewe">Cewe</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No Telepon</label>
                                    <input type="number" name="noTelepon" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->noTelepon }}">

                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endpush
