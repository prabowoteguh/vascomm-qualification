@extends('layouts.app')

@section('content')
<style type="text/css">
    .my-active span{
        background-color: #5cb85c !important;
        color: white !important;
        border-color: #5cb85c !important;
    }
</style>
<h1 class="h3 mb-2 text-gray-800">List Karyawan</h1>
<!-- <p class="mb-4">Selamat datang di SHOE WORKSHOP DESKTOP APP, disini anda bisa mengelola Laporan Absensi, data Karyawan, dan melihat statistik Absen.</p> -->
{{-- Alert --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-styled-left alert-arrow-left alert-component content-group-lg">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success alert-styled-left alert-arrow-left alert-component content-group-lg">
        {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
{{-- EndAlert --}}
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Karyawan</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="/karyawan/create" class="btn btn-success float-right"><i class="fa fa-plus"></i>Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col text-center">#</th>
                            <th scope="col text-center">Nama</th>
                            <th scope="col text-center">Email</th>
                            <th scope="col text-center">No. HP</th>
                            <th scope="col text-center">Jabatan</th>
                            <th scope="col text-center">Alamat</th>
                            <th scope="col text-center" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($record as $v)
                            <tr>
                                <td scope="row">#</td>
                                <td>{{ $v->name }}</td>
                                <td>{{ $v->email }}</td>
                                <td>{{ $v->phone }}</td>
                                <td>{{ $v->position }}</td>
                                <td>{{ $v->address }}</td>
                                <td class="text-center">
                                    <a href="/karyawan/edit/{{ $v->id }}" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>
                                    <a href="/karyawan/destroy/{{ $v->id }}" class="btn btn-danger delete"> <i class="fa fa-trash"></i> </a>
                                </td>
                                <form action="/karyawan/destroy/{{ $v->id }}" method="POST" id="/karyawan/destroy/{{ $v->id }}">
                                    @csrf
                                </form>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center"><h6>Tidak Ada data</h6></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $record->links() }}
                {{ $record->render() }}
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        //onload
    })();

    let elements = document.getElementsByClassName("delete");

    let myFunction = function(e) {
        e.preventDefault()
        if (window.confirm('Apakah anda yakin untuk menghapus data tersebut?'))
        {
            // window.location.href = e.target.getAttribute('href')
            document.getElementById(e.target.getAttribute('href')).submit()
        }
    };

    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', myFunction, false);
    }

    // document.getElementsByClassName('delete')[0].addEventListener('click', function (e) {
    //     e.preventDefault()
    //     if (window.confirm('Apakah anda yakin untuk menghapus data tersebut?'))
    //     {
    //         // window.location.href = e.target.getAttribute('href')
    //         document.getElementById(e.target.getAttribute('href')).submit()
    //     }
    // })
</script>
@endsection
