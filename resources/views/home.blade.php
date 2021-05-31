@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-2 text-gray-800">HOME</h1>
  <p class="mb-4">Selamat datang di SHOE WORKSHOP DESKTOP APP, disini anda bisa mengelola Laporan Absensi, data Karyawan, dan melihat statistik Absen.</p>
  <div class="row">
      <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">STATISTIK KETEPATAN ABSEN</h6>
              </div>
              <div class="card-body">
                  <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="myAreaChart" width="668" height="320" style="display: block; width: 668px; height: 320px;" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">ABSENSI - DONUT CHART</h6>
              </div>
              <div class="card-body">
                  <div class="chart-pie pt-4">
                    <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                      </div>
                    </div>
                    <canvas id="myPieChart" width="301" height="253" style="display: block; width: 301px; height: 253px;" class="chartjs-render-monitor"></canvas>
                  </div>
                  <hr>
                  DONUT CHART ini menggambarkan statistik Absensi SHOE WORKSHOP
              </div>
          </div>
      </div>
  </div>

@endsection