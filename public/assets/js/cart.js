const order_detail_wrapper = document.querySelector("#order_detail_wrapper");

function addProduk(produk, elmButton) {
    console.log(produk);
    console.log(elmButton);
    // $("#order_detail_wrapper").append("cokk");
    $(elmButton).addClass("btn btn-danger").text("delete");
    $("#order_detail_wrapper").append(`
    <div class="row gap-2 pb-2">
        <p  class="m-0 col-md-4"> ${produk.nama_produk}</p>
        <input style="width: 70px;" class="form-control col-md-2 p-0" type="number" min="1" value="1">
        <p class="d-flex justify-content-end m-0 col-md-6 subtotal" >Rp${produk.harga}</p>
    </div>`);
}

function changeQuantity(params) {
    
}