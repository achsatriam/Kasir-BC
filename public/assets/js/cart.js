const order_detail_wrapper = document.querySelector("#order_detail_wrapper");
let current_total = 0

function changeQuantity(produk, inputElm) {
    $('#harga-' + produk.id).val(inputElm.value * produk.harga);
    // $('#total-input').val(current_total - produk);

    setTotal()
}
function setTotal() {
    let sub_totals = document.querySelectorAll('.subtotal');
    current_total = 0
    console.log(sub_totals);
    sub_totals.forEach(s_total => {
        current_total += parseInt($(s_total).val());
        $('#total-input').val(current_total);
    });
    // console.log(current_total);
}

function addProduk(produk, elmButton) {
    if ($(elmButton).hasClass('btn-danger')) {
        $('#item-' + produk.id).remove();
        setTotal()
        $(elmButton).removeClass('btn-danger');
        $(elmButton).text('Add');
    } else {
        let produkJSON = {
            id: produk.id,
            kategori_id: produk.kategori_id,
            nama_produk: produk.nama_produk,
            stok: produk.stok,
            harga: produk.harga,
            foto: produk.foto
        }
        produkJSON = JSON.stringify(produkJSON)
        $(elmButton).addClass("btn-danger").text("delete");

        $("#order_detail_wrapper").append(`
        <div class="row  pb-2" id='item-${produk.id}'>
            <div class="col-md-4">
                <p class="m-0 "> ${produk.nama_produk}</p>
            </div>
            <div class="col-md-2">
                <input type="hidden" name="produks[]" value='${JSON.stringify(produk)}'/>
                <input  name="quantity[]" class="form-control col-md-2 p-0 input-quantity" type="number" min="1" value="1" onChange='changeQuantity(${JSON.stringify(produk)}, this)'/>
            </div>
            <div class="col-md-4 d-flex">
                <span>Rp. </span> <input type="number" class="form-control col-md-6 p-0 subtotal" id="harga-${produk.id}" value="${produk.harga}"/>
            </div>
        </div>`);

        current_total += produk.harga
        $('#total-input').val(current_total);
    }
}

