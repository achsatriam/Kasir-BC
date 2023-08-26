@extends('template.index')

@section('title')
  Makanan
@endsection

@section('produk-active', 'active open')

@section('content')
  <!-- / Menu -->

  <div class="layout-page">
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <ul class="navbar-nav flex-row align-items-center ms-auto">
      </ul>
    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data/ </span> Produk</h4>
      <tbody>
        <!-- Hoverable Table rows -->
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <a href="{{ route('addproduk') }}">
              <button type="button" class="btn btn-success">Add</button>
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($produk as $item)
                    <tr>
                      <input type="hidden" class="delete_id" value="{{ $item->id }}">
                      <td>
                        <img class="zoom" src="{{ asset('post-images/' . $item->foto) }}">
                      </td>
                      <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <strong>{{ $item->nama_produk }}</strong>
                      </td>
                      <td><span>Rp {{ number_format($item->harga) }}</span></td>
                      <td>{{ $item->stok }}</td>
                      <td>{{ $item->kategori->kategori }}</td>
                      <td>
                        <div class="d-flex justify-content-center gap-2 align-items-center">
                          <a href="{{ url('produk/edit', $item->id) }}">
                            <button type="button" class="btn btn-outline-primary">Edit</button>
                          </a>
                          <form class="m-0" method="post" action="{{ url('produk' . '/' . $item->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-outline-danger btndelete">Delete</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--/ Hoverable Table rows -->
      </tbody>
    </div>
  @endsection
  <script src="{{ asset('assets\js\jquery-3.6.1.min.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $(document).ready(function() {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.btndelete').click(function(e) {
        e.preventDefault();

        var deleteid = $(this).closest("tr").find('.delete_id').val();

        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak dapat memulihkan data ini lagi!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              var data = {
                "_token": $('input[name=_token]').val(),
                'id': deleteid,
              };
              $.ajax({
                type: "DELETE",
                url: 'produk/' + deleteid,
                data: data,
                success: function(response) {
                  swal(response.status, {
                      icon: "success",
                    })
                    .then((result) => {
                      location.reload();
                    });
                }
              });
            }
          });
      });
      $("#kategori_id").change(function(e) {
        e.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        console.log($(this).val());
        $.ajax({
          type: "get",
          url: "",
          data: {
            kategori: $(this).val()
          },
          dataType: "json",
          success: function(response) {

          }
        });
      });
    });
  </script>
