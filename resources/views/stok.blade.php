@extends('template.index')

@section('title')
    Add stok
@endsection

@section('stok-active', 'active open')

@section('content')
  <!-- / Menu -->

  <div class="layout-page">
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <ul class="navbar-nav flex-row align-items-center ms-auto">
      </ul>
    </div>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Basic Layout</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama Produk</label>
                    <input type="text" class="form-control" id="basic-default-fullname" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Harga</label>
                    <input type="text" class="form-control" id="basic-default-company" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Jenis Kategori</label>
                    <select name="kategori_produk_id" class="form-select" value="{{ old('kategori_produk_id') }}" id="kategori_produk_id" aria-label="Default select example">
                        {{-- @foreach ($kategori_produk as $item)
                          <option value="{{ $item->id }}">{{ $item->kategori_produk }}</option>
                        @endforeach --}}
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Jumlah</label>
                    <input type="text" class="form-control" id="basic-default-company" />
                  </div>
                  <button type="submit" class="btn btn-primary">Send</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Basic with Icons</h5>
              </div>
              <div class="card-body">
                <form>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Total</label>
                      <input type="text" class="form-control" id="basic-default-fullname" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-company">Bayar</label>
                      <input type="text" class="form-control" id="basic-default-company" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-company">Kembalian</label>
                      <input type="text" class="form-control" id="basic-default-company" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Kembalian</label>
                        <input type="text" class="form-control" id="basic-default-company" />
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
    </div>
@endsection