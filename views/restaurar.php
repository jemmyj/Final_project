<!DOCTYPE html>
<html lang="es">
<?php


require_once("../models/Usuario.php");


if (isset($_POST["inicio_sesion"])) {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $usuario = new Usuario();
    $resultado = $usuario->login($correo, $contrasena);

    if ($resultado == "1") {
        header("Location: /"); //redirigir al usuario a la página de inicio después del inicio de sesión exitoso
    } else {
        $mensaje_error = $resultado; //mostrar mensaje de error al usuario
    }
}
?>

<head>
    <?php include '../config/MainHead.php'; ?>
</head>
<style>
    form {
        background-color: #ffffff;
        border: 1px solid #dddddd;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        max-width: 480px;
        padding: 32px;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    label {
        display: block;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    input[type="email"],
    input[type="password"] {
        border: 1px solid #dddddd;
        font-size: 16px;
        padding: 8px;
        width: 100%;
    }

    input[type="submit"] {
        background-color: #007bff;
        border: none;
        color: #ffffff;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        margin-top: 16px;
        padding: 12px;
        width: 100%;
    }

    input {
        margin-bottom: 10px;
    }

    input[type="submit"]:hover {
        background-color: #0069d9;
    }

    .error {
        color: #ff0000;
        font-size: 14px;
        margin-top: 8px;
    }
</style>

<body>
    <div class="page-holder">
        <?php include '../config/MainHeader.php'; ?>
        <div class="container">
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="h2 text-uppercase mb-0">Recover password</h1>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                    <li class="breadcrumb-item"><a class="text-dark" href="../">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Recover Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- recuperar-contrasena.php -->
            <form action="../views/restablecer.php" method="POST">
                <h1>Don't worry, you can reset your password!</h1>
                <br>
                <br>

                <label for="correo">Introduce your email:</label>
                <input type="email" id="correo" name="correo"><br>
                <input type="submit" name="enviar" value="Send">
            </form>
        </div>
        <footer class="bg-dark text-white">
            <?php include '../config/MainFooter.php'; ?>
        </footer>
        <!-- JS -->
        <?php include '../config/MainJs.php'; ?>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>


</body>

</html>