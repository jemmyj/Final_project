
$(document).ready(function () {
    $('a[href^="agregar_carrito.php"]').on('click', function (e) {
        e.preventDefault();
        $('#agregadoModal').modal('show');
    });
});
