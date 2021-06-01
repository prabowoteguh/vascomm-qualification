@extends('layouts.main')

@section('content')
  <h1 class="h3 mb-2 text-gray-800">Tambah Karyawan Baru</h1>
  <!-- <p class="mb-4">Selamat datang di SHOE WORKSHOP DESKTOP APP, disini anda bisa mengelola Laporan Absensi, data Karyawan, dan melihat statistik Absen.</p> -->
  <div class="row">
      <div class="col-xl-12 col-lg-12">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">FORM KARYAWAN BARU</h6>
              </div>
              <div class="card-body">
              <form class="" id="" method="POST" action="/karyawan/store">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap Karyawan">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Karyawan">
                </div>
                <div class="form-group">
                    <label for="phone">No. Hp</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="No. Hp Karyawan">
                </div>
                <div class="form-group">
                    <label for="position">Jabatan</label>
                    <input type="text" class="form-control" id="position" name="position" placeholder="No. Hp Karyawan">
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" name="address" cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              </div>
          </div>
      </div>
  </div>

@endsection
