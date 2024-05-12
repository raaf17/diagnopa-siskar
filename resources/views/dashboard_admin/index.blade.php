@extends('layouts.main')

@section('main-content')

{{-- Jumlah setiap master data --}}
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fa-solid fa-code-fork fa-2x"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Gejala</h4>
        </div>
        <div class="card-body">
          {{ $gejala }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fa-solid fa-viruses fa-2x"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Penyakit</h4>
        </div>
        <div class="card-body">
          {{ $penyakit }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fa-solid fa-users fa-2x" style="--fa-primary-color: white;"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total User</h4>
        </div>
        <div class="card-body">
          {{ $users }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fa-regular fa-newspaper fa-2x" style="--fa-primary-color: white;"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Posts</h4>
        </div>
        <div class="card-body">
          {{ $posts }}
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Grafik jumlah diagnosa --}}
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4>Summary</h4>
        <div class="card-header-action">
          <a href="#summary-chart" data-tab="summary-tab" class="btn active">Chart</a>
          <a href="#summary-text" data-tab="summary-tab" class="btn">Text</a>
        </div>
      </div>
      <div class="card-body">
        <div class="summary">
          <div class="summary-info" data-tab-group="summary-tab" id="summary-text">
            <h4>$1,858</h4>
            <div class="text-muted">Sold 4 items on 2 customers</div>
            <div class="d-block mt-2">
              <a href="#">View All</a>
            </div>
          </div>
          <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
            <canvas id="myChart" height="180"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection