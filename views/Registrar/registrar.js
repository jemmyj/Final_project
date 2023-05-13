$("#register-form").on("submit", function (e) {

    e.preventDefault();

    var formData = new FormData($("#register-form")[0]);

    // Meto los ficheros para que se vayan con el FORM DATA

    $.ajax({
        url: "../../controller/register.php?op=registrar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (text) {

            // Si la respuesta es exitosa, mostramos el mensaje de éxito al usuario
            Swal.fire('Registro exitoso!', '', 'success').then((result) => {
                if (result.isConfirmed) {
                    $("#register-form")[0].reset();

                    $.post("../login.php", {
                        email: formData.get("email"),
                        password: formData.get("password")
                    })

                    // Redirigir al usuario a login.php
                    window.location.href = "../login.php";
                }
            });

        }// del success 

    }); // del ajax

});
