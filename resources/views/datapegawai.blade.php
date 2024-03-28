@extends('layout.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pegawai</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <a href="/tambah-pegawai" class="btn btn-success mb-4">Tambah +</a>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-auto">
                    <form action="/pegawai" method="GET">
                        <input type="search" name="search" id="inputPassword6" class="form-control"
                            aria-describedby="passwordHelpInline">
                    </form>
                </div>
                <div class="col-auto">
                    <a href="/exportpdf" class="btn btn-info">Export PDF </a>
                </div>
                <div class="col-auto">
                    <a href="/exportexcel" class="btn btn-outline-success">Export Excel </a>
                </div>
            </div>
            <div class="row p-3">
                {{-- ALERT --}}
                {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif --}}

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No Telepon</th>
                                <th scope="col">Dibuat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $index => $item)
                                <tr>
                                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <img src="{{ asset('fotopegawai/' . $item->foto) }}" alt=""
                                            style="width: 60px">
                                    </td>
                                    <td>{{ $item->jenisKelamin }}</td>
                                    <td>0{{ $item->noTelepon }}</td>
                                    <td>{{ $item->created_at->format('D M Y') }}</td>
                                    <td>
                                        {{-- <a href="/delete-data/{{ $item->id }}" class="btn btn-danger">Delete</a> --}}
                                        <a href="#" class="btn btn-danger delete" data-id="{{ $item->id }}"
                                            data-nama="{{ $item->nama }}">Delete</a>

                                        <a href="/tampil-data/{{ $item->id }}" class="btn btn-info">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix mt-2">
                    <ul class="pagination m-0 float-right">
                        <li class="page-item">{{ $data->links() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $('.delete').click(function() {
            var pegawaiId = $(this).attr('data-id');
            var namaPegawai = $(this).attr('data-nama');
            swal({
                title: "Yakin?",
                text: "Ingin menghapus data pegawai dengan nama " + namaPegawai + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete-data/" + pegawaiId + ""

                    swal("Data pegawai berhasil dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus!")
                }
            });
        });
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endpush
