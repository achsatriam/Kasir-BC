@extends('template.index')

@section('title')
    Dashboard
@endsection

@section('dashboard-active', 'active open')

@section('content')
  <!-- / Menu -->
  <div class="layout-page">
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <ul class="navbar-nav flex-row align-items-center ms-auto">
      </ul>
    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data/ </span> Laporan</h4>
      <div class="row">
        <div class="col-md-6 col-xl-4">
          <div class="card bg-primary text-white mb-3">
            <div class="card-header">Total Produk :</div>
            <div class="card-body">
              <h5 class="card-title text-white">{{ $produk }}</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card bg-success text-white mb-3">
            <div class="card-header">Total Kategori :</div>
            <div class="card-body">
              <h5 class="card-title text-white">{{ $kategori }}</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card bg-danger text-white mb-3">
            <div class="card-header">Total Penghasilan :</div>
            <div class="card-body">
              <h5 class="card-title text-white">Rp 1.000.000</h5>
            </div>
          </div>
        </div>
        <!-- / Content -->
      </div>
    </div>
  </div>
@endsection