$("#register-form").on("submit", function (e) {
    e.preventDefault();

    var name = $("#name").val();
    var email = $("#correo").val();
    var password = $("#contrasena").val();

    // Expresiones regulares para validar los campos
    var nameRegex = /^[A-Za-z\s]+$/; // Solo permite letras y espacios
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; // Valida el formato de email
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/; // Requiere al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número

    // Verificar cada campo con su expresión regular correspondiente
    var isValidName = name.match(nameRegex);
    var isValidEmail = email.match(emailRegex);
    var isValidPassword = password.match(passwordRegex);

    // Mostrar mensajes de error si los campos no son válidos
    if (!isValidName) {
        $("#name-error").text("Please enter a valid name.");
    } else {
        $("#name-error").text("");
    }

    if (!isValidEmail) {
        $("#email-error").text("Please enter a valid email address.");
    } else {
        $("#email-error").text("");
    }

    if (!isValidPassword) {
        $("#password-error").text("Please enter a valid password. It should be at least 8 characters long, contain one uppercase letter, one lowercase letter, and one number.");
    } else {
        $("#password-error").text("");
    }

    // Si todos los campos son válidos, realizar la solicitud AJAX
    if (isValidName && isValidEmail && isValidPassword) {
        // Verificar si el correo ya está registrado
        $.ajax({
            url: "../../controller/register.php?op=verifyUser",
            type: "POST",
            data: { email: email },
            success: function (response) {
                if (response !== null) {
                    // El correo ya está registrado
                    $("#email-error").text("Email is already registered.");
                } else {
                    // El correo no está registrado, realizar la solicitud de registro
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
                            Swal.fire('Successful registration!', '', 'success').then((result) => {
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
                }
            }
        });
    }
});
