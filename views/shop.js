/* 
$(document).ready(function () {
    $('a[href^="agregar_carrito.php"]').on('click', function (e) {
        e.preventDefault();
        $('#agregadoModal').modal('show');
    });
});
 */
$("#selectpicker").on("change", function () {
    // Obtén el valor seleccionado
    var selectedValue = $(this).val();

    // Establece una cookie con el valor seleccionado
    document.cookie = "filtro=" + selectedValue + "; path=/";

    // Obtén la página actual de la URL
    var pagina_actual = getUrlParameter("pagina");

    // Construye la URL con el valor seleccionado y la página actual
    var url = "./shop.php?filtro=" + selectedValue + "&pagina=" + pagina_actual + " #tablaProductos";

    // Realiza la solicitud AJAX y actualiza la tabla
    $("#tablaProductos").load(url);
});

// Función para obtener parámetros de la URL
function getUrlParameter(name) {
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(window.location.href);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}