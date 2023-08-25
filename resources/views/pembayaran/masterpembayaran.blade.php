@extends('template.index')

@section('title')
    Pembayaran
@endsection

@section('payment-active', 'active open')

@section('content')
    <!-- / Menu -->

    <div class="layout-page">
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
            </ul>
        </div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data/ </span> Pembayaran</h4>
            <tbody>
                <div class="row">
                    <!-- Hoverable Table rows -->
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($produk as $item)
                                                {{-- kodingan memekd --}}
                                                {{-- <tr>
                                                    <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                                    <td>
                                                        <img class="zoom" src="{{ asset('post-images/' . $item->foto) }}"
                                                            width="100px" alt="">
                                                    </td>
                                                    <td>
                                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $item->nama_produk }}</strong>
                                                    </td>
                                                    <td><span>Rp {{ number_format($item->harga) }}</span></td>
                                                    <td>
                                                        <div data-stok="{{ $item->stok }}"
                                                            class="d-flex justify-content-center gap-2 align-items-center">
                                                            <button type="button" id="delete_produk_{{ $loop->iteration }}"
                                                                onclick="del('{{ $loop->iteration }}','{{ $item->nama_produk }}', {{ $item->harga }})"
                                                                class="btn btn-outline-danger d-none">Delete</button>
                                                            <button type="button" id="add_produk_{{ $loop->iteration }}"
                                                                onclick="add('{{ $loop->iteration }}','{{ $item->nama_produk }}', {{ $item->harga }})"
                                                                class="btn btn-outline-success">Add</button>
                                                        </div>
                                                    </td>
                                                </tr> --}}
                                                {{-- end kodingan memekd --}}

                                                {{-- kodingan david --}}
                                                <tr>
                                                    <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                                    <td>
                                                        <img class="zoom" src="{{ asset('post-images/' . $item->foto) }}"
                                                            width="100px" alt="">
                                                    </td>
                                                    <td>
                                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $item->nama_produk }}</strong>
                                                    </td>
                                                    <td><span>Rp {{ number_format($item->harga) }}</span></td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2 align-items-center">
                                                            <button type="button"
                                                                class="btn btn-outline-danger d-none">Delete</button>
                                                            <button type="button"
                                                                onclick="addProduk({{ $item }}, this)"
                                                                class="btn btn-outline-success">Add</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- end kodingan david --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Hoverable Table rows -->
                    <div class="col-md-5">
                        <div class="card mb-4">

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Rincian</h5>
                            </div>
                            <div class="card-body">
                                <div id="rincian">
                                    <div class="" id="order_detail_wrapper">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" onclick="getTotal()" class="btn btn-primary">Send</button>
                                </div>
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Total</label>
                                        <input disabled type="text" class="form-control" id="total" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Bayar</label>
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
            </tbody>
        </div>
    @endsection
    <script src="{{ asset('assets\js\jquery-3.6.1.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @push('admin_script')
        <script src="{{ asset('assets/js/cart.js') }}"></script>
    @endpush
    {{-- <script>
        console.log('test');
        var array_produk = []

        function add(id, name, price, stok) {
            array_produk.push({
                'id': id,
                'name': name,
                'price': price,
            })
            let divs = ''
            console.log(array_produk)
            $.each(array_produk, function(index, val) {
                console.log(val);
                divs += `<div class="row gap-2 pb-2">
                             <p  class="m-0 col-md-4">${(index+1)} ${val.name}</p>
                             <input style="width: 70px;" class="form-control col-md-2 p-0" type="number" data-inputid="${(parseInt(val.id))}" onchange="updateSubtotal(${val.id},${val.price})" id="quantity-${val.id}" min="1" max="{{ $item->stok }}">
                             <p class="d-flex justify-content-end m-0 col-md-6 subtotal" id="subtotal-${val.id}">Rp${val.price.toLocaleString('id-ID')}</p>
                         </div>`
            });
            $('#delete_produk_' + id).toggleClass('d-none');
            $('#add_produk_' + id).toggleClass('d-none');
            $('#rincian').html(divs);
        }

        function del(id, name, price) {
            var index = array_produk.findIndex(element => {
                if (element.id == id) {
                    return true
                }
            })
            console.log(index);

            array_produk.splice(index, 1)

            let divs = ''
            $.each(array_produk, function(index, val) {
                // console.log(val.name + ' ' + val.price)
                
                divs += `<div class="row gap-2 pb-2">
                             <p  class="m-0 col-md-4">${(index+1)} ${val.name}</p>
                             <input style="width: 70px;" class="form-control col-md-2 p-0" type="number" data-inputid="${(parseInt(index))}" onchange="updateSubtotal(this)" id="${val.id}" min="1" max="{{ $item->stok }}">
                             <p class="d-flex justify-content-end m-0 col-md-6 subtotal" id="subtotal-${val.id}">Rp${val.price.toLocaleString('id-ID')}</p>
                         </div>`
            });
            $('#delete_produk_' + id).toggleClass('d-none');
            $('#add_produk_' + id).toggleClass('d-none');
            $('#rincian').html(divs);
        }

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
                                url: 'kategori/' + deleteid,
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
        });

        function updateSubtotal(id, price) {
            console.log(id, price);
            // $(document).ready(function() {
                let quantity = $('#quantity-' + id).val();
                let updated_subtotal = price * quantity
                $('#subtotal-'+ id).text('Rp'+updated_subtotal.toLocaleString('id-ID'));
                // var id = $(input).attr('data-inputid');
                // console.log(id);
                // var value = $(input).val();
                // var stok = $('#kategori_' + id).attr('data-stok');
                // console.log(stok);
                // if ((value !== '') && (value.indexOf('.') === -1)) {
                //     $(input).val(Math.max(Math.min(value, stok), -stok));
                // }
                // console.log(input);
            // });
        }

        function getTotal() {
            let subTotal = document.querySelectorAll('.subTotal')
            let total = 0
            $.each(subTotal, function (indexInArray, element) { 
                total += parseFloat(element.childNodes[0].data.replace(/[^0-9]/g, ''))
            });
            $('#total').val(`Rp${total.toLocaleString('id-ID')}`);
        }
    </script> --}}
