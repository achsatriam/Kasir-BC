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
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Dashboard</h4>
      <div class="row">
        <div class="col-md-6 col-xl-4">
          <div class="card bg-primary text-white mb-3">
            <div class="card-header">Jumlah Produk Makanan :</div>
            <div class="card-body">
              <h5 class="card-title text-white">12</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card bg-success text-white mb-3">
            <div class="card-header">Jumlah Produk Minuman :</div>
            <div class="card-body">
              <h5 class="card-title text-white">14</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card bg-danger text-white mb-3">
            <div class="card-header">Jumlah Produk Alat Tulis :</div>
            <div class="card-body">
              <h5 class="card-title text-white">20</h5>
            </div>
          </div>
        </div>
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <!-- Total Revenue -->
            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
              <div class="card">
                <div class="row row-bordered g-0">
                  <div class="col-md-8">
                    <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                    <div id="totalRevenueChart" class="px-2"></div>
                  </div>
                  <div class="col-md-4">
                    <div class="card-body">
                      <div class="text-center">
                        <div class="dropdown">
                          <button
                            class="btn btn-sm btn-outline-primary dropdown-toggle"
                            type="button"
                            id="growthReportId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            2022
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                            <a class="dropdown-item" href="javascript:void(0);">2021</a>
                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="growthChart"></div>
                    <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>
      
                    <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                      <div class="d-flex">
                        <div class="me-2">
                          <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                        </div>
                        <div class="d-flex flex-column">
                          <small>2022</small>
                          <h6 class="mb-0">$32.5k</h6>
                        </div>
                      </div>
                      <div class="d-flex">
                        <div class="me-2">
                          <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                        </div>
                        <div class="d-flex flex-column">
                          <small>2021</small>
                          <h6 class="mb-0">$41.2k</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Total Revenue -->
          </div>
        </div>
        <!-- / Content -->
      </div>
    </div>
  </div>
@endsection