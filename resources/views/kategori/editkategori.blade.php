@extends('template.index')

@section('title')
    Add Produk
@endsection

@push('admin_style')
  <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush

@section('kategoriproduk-active', 'active open')

@section('content')
  <!-- / Menu -->

  <div class="layout-page">
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <ul class="navbar-nav flex-row align-items-center ms-auto">
      </ul>
    </div>
  <!-- Content -->
  <link rel="stylesheet" href="css/materialize.min.css">
  <div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data/ Produk/ </span> Add</h4>

  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
        </div>
        <div class="card-body">
          <form action="{{ url('kategori') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Kategori</label>
              <div class="col-sm-10">
                <input 
                  type="text" 
                  name="kategori" 
                  class="form-control @error('kategori') is-invalid @enderror" 
                  value="{{ old ('nama_produk', $kategori->kategori) }}" id="kategori" autofocus/>
                @error('kategori')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" value="Save" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('admin_script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
  <script>
    $('.dropify').dropify();
  </script>
@endpush