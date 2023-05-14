
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
