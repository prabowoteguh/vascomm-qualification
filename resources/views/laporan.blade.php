@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">PILIH PERIODE LAPORAN</h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label>DATE START</label>
          <input type="date" class="form-control">
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label>DATE END</label>
          <input type="date" class="form-control">
        </div>
      </div>
      <div class="col-12 text-left">
        <button type="button" class="btn btn-success">FILTER</button>
        <a href="{{ url('uploads/example/LAPORAN-ABSEN_SHOE-WORKSHOP_JUNI-2021.xlsx') }}" class="btn btn-info" download>DOWNLOAD EXAMPLE</a>
      </div>
    </div>
  </div>
</div>

@endsection