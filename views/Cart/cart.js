
//ELIMINAR UN PRODUCTO DEL CARRITO

function delete_cart(id) {
    swal.fire({
        title: 'Delete',
        text: "¿You wish to delete the product?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/cart.php?op=delete_cart", { id: id }, function (data) {
                swal.fire(
                    'Deleted',
                    'The product was deleted',
                    'success'
                ).then(() => {
                    location.reload();
                });
            });
        }
    })
}



function decrementQuantity(btn) {
    var input = $(btn).siblings(".quantity-input");
    var quantity = parseInt(input.val());
    input.val(quantity - 1);
    if (input.val() == 0) {
        input.val(1);
    }
    updateSubtotal($(btn));
    updateTotal(); // Update the total after updating the subtotal
}

function incrementQuantity(btn) {
    var input = $(btn).siblings(".quantity-input");
    var quantity = parseInt(input.val());
    input.val(quantity + 1);
    updateSubtotal($(btn));
    updateTotal(); // Update the total after updating the subtotal
}

function updateSubtotal(btn) {
    var quantityInput = btn.siblings(".quantity-input");
    var quantity = parseInt(quantityInput.val());
    var price = parseFloat(btn.closest("tr").find(".p-3:eq(0)").text().replace(" €", ""));
    var subtotal = quantity * price;
    btn.closest("tr").find(".product-subtotal").text(subtotal.toFixed(2) + " €");
}

function updateTotal() {
    var total = 0;
    $(".product-subtotal").each(function () {
        var subtotal = parseFloat($(this).text().replace(" €", ""));
        if (!isNaN(subtotal)) {
            total += subtotal;
        }
    });
    $(".cart-total").text(total.toFixed(2) + " €");
}

$(document).ready(function () {
    // Rest of the JavaScript code

    // Update subtotals and total when the page loads
    updateTotal();
});
