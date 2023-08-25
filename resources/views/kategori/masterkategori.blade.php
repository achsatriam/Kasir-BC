@extends('template.index')

@section('title')
    Makanan
@endsection

@section('kategoriproduk-active', 'active open')

@section('content')
  <!-- / Menu -->

  <div class="layout-page">
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <ul class="navbar-nav flex-row align-items-center ms-auto">
      </ul>
    </div>
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data/ </span> Kategori</h4>
    <tbody>
        <!-- Hoverable Table rows -->
        <div class="card">
            {{-- <h5 class="card-header">Hoverable rows</h5> --}}
            <div class="card-header" style="display: flex">
              <a href="{{ route ('addkategori') }}">
                <button type="button" class="btn btn-success">Add</button>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>Kategori</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach($kategori as $item)
                    <tr>
                      <input type="hidden" class="delete_id" value="{{ $item->id }}">
                      <td style="width: 50%">
                        <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->kategori }}</strong>
                      </td>
                      <td style="width: 50%">
                        <div class="d-flex justify-content-center gap-2 align-items-center">
                          <a href="{{ url('kategori/edit',  $item->id )  }}">
                            <button type="button" class="btn btn-outline-primary">Edit</button>
                          </a>
                          <form class="m-0" method="post" action="{{ url('produk' .  '/' . $item->id) }}">
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
                          url: 'kategori/' + deleteid,
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