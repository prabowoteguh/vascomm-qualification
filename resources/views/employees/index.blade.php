@extends('layouts.main')

@section('content')
<h1 class="h3 mb-2 text-gray-800">List Karyawan</h1>
<!-- <p class="mb-4">Selamat datang di SHOE WORKSHOP DESKTOP APP, disini anda bisa mengelola Laporan Absensi, data Karyawan, dan melihat statistik Absen.</p> -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Karyawan</h6>
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
                            <th scope="col text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>mark.z@gmail.com</td>
                            <td>0823-9988-1234</td>
                            <td>Web Developer</td>
                            <td>Jl. Merak Ngibing 12 Bandung</td>
                            <td>
                              <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button>
                              <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
