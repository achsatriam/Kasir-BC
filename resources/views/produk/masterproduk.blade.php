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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Makanan</h4>
    <tbody>
        <!-- Hoverable Table rows -->
        <div class="card">
            {{-- <h5 class="card-header">Hoverable rows</h5> --}}
            <div class="card-header" style="display: flex">
              <a href="{{ route ('addproduk') }}">
                <button type="button" class="btn btn-success">Add</button>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach($produk as $item)
                    <tr>
                      <input type="hidden" class="delete_id" value="{{ $item->id }}">
                      <td>
                        <img class="zoom" src="{{ asset('post-images/'. $item->foto) }}" width="100px" alt="">
                      </td>
                      <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->nama_produk }}</strong>
                      </td>
                      <td><span>Rp {{ number_format($item->harga) }}</span></td>
                      <td>
                        <div style="display: flex; gap: 10px;">
                          <a href="{{ url('/produk/' . $item->id)}}">
                            <button type="button" class="btn btn-outline-info">Show</button>
                          </a>
                          <a href="{{ url('produk/edit',  $item->id )  }}">
                            <button type="button" class="btn btn-outline-primary">Edit</button>
                          </a>
                          <form method="post" action="{{ url('produk' .  '/' . $item->id) }}">
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
  $(document).ready(function () {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('.btndelete').click(function (e) {
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
                          success: function (response) {
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
  });
</script>