/* $(document).ready(function () {
    $('#loginForm').submit(function (event) {
        event.preventDefault(); // Evita el envío del formulario

        var correo = $('#correo').val();
        var contrasena = $('#contrasena').val();

        // Validación del campo correo
        if (correo === "") {
            mostrarError("Por favor ingresa un correo.");
            return;
        }

        // Validación del campo contraseña
        if (contrasena === "") {
            mostrarError("Por favor ingresa una contraseña.");
            return;
        }

        // Si se ha superado la validación, enviar el formulario
        $('#loginForm').unbind('submit').submit();
    });
});

function mostrarError(mensaje) {
    $('#error-message').text(mensaje);
} */