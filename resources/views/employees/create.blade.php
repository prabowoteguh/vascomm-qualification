@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-2 text-gray-800">User</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">FORM USER</h6>
              </div>
              <div class="card-body">
              <form class="" id="" method="POST" action="{{ (isset($record) ? '/user/update' : '/user/store') }}">
                @csrf
                <input type="hidden" name="jwt_token" value="{{ session('bacod_token') }}">
                <input type="hidden" name="id" value="{{ (isset($record) ? $record->id : old('id')) }}">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input value="{{ (isset($record) ? $record->name : old('name')) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="{{ (isset($record) ? $record->email : old('email')) }}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1" {{ (isset($record) && $record->role == 1 ? "selected" : "") }}>Admin</option>
                        <option value="2" {{ (isset($record) && $record->role == 2 ? "selected" : "") }}>User</option>
                    </select>
                    @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Profile Photo</label>
                    <input value="{{ (isset($record) ? $record->avatar : old('avatar')) }}" type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" placeholder="Profile User">
                    @error('avatar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/user/list" type="submit" class="btn btn-secondary">Cancel</a>
              </form>
              </div>
          </div>
      </div>
  </div>

@endsection
