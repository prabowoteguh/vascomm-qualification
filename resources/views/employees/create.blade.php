@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">FORM KARYAWAN</h6>
              </div>
              <div class="card-body">
              <form class="" id="" method="POST" action="{{ (isset($record) ? '/karyawan/update' : '/karyawan/store') }}">
                @csrf
                <input type="hidden" name="jwt_token" value="{{ session('bacod_token') }}">
                <input type="hidden" name="id" value="{{ (isset($record) ? $record->id : old('id')) }}">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input value="{{ (isset($record) ? $record->name : old('name')) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap Karyawan">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="{{ (isset($record) ? $record->email : old('email')) }}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Karyawan">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">No. Hp</label>
                    <input value="{{ (isset($record) ? $record->phone : old('phone')) }}" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="No. Hp Karyawan">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="position">Jabatan</label>
                    <input value="{{ (isset($record) ? $record->position : old('position')) }}" type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="No. Hp Karyawan">
                    @error('position')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" cols="30" rows="5">{{ (isset($record) ? $record->address : old('address')) }}</textarea>
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/karyawan/list" type="submit" class="btn btn-secondary">Cancel</a>
              </form>
              </div>
          </div>
      </div>
  </div>

@endsection
