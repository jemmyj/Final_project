$(document).ready(function () {

    /* Para aumentar likes, y guardar */

    // Define una variable para llevar el registro de la cantidad actual de favoritos
    var num_favoritos = $('#valor_likes').val();
    // Añade un controlador de eventos de clic al botón de favoritos
    $('#btn-favoritos').click(function (event) {
        event.preventDefault(); // Evita que el enlace se siga a sí mismo
        // Realiza una solicitud AJAX al servidor para actualizar la cantidad de favoritos
        $.ajax({
            url: 'actualizar_favoritos.php',
            type: 'POST',
            data: { accion: 'aumentar' },
            success: function (data) {
                // Actualiza el número de favoritos con la nueva cantidad
                num_favoritos++;
                $('#num-favoritos').text(' (' + num_favoritos + ')');

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });



});
