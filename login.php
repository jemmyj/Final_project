<!DOCTYPE html>
<html lang="es">
<?php


require_once("models/Usuario.php");



if (isset($_POST["inicio_sesion"])) {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $usuario = new Usuario();
    $resultado = $usuario->login($correo, $contrasena);

    if ($resultado == "1") {
        header("Location: index.php"); //redirigir al usuario a la página de inicio después del inicio de sesión exitoso
    } else {
        $mensaje_error = $resultado; //mostrar mensaje de error al usuario
    }
}
?>

<?php include 'config/MainHead.php'; ?>
<style>
    body {
        background-color: #f8f8f8;
        font-size: 16px;
        line-height: 1.5;
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 16px;
        text-align: center;
        margin-top: 50px;
    }

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
        <?php include 'config/MainHeader.php'; ?>
        <!--  Content -->
        <h1>Iniciar sesión</h1>
        <form action="login.php" method="POST">
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo"><br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena"><br>
            <br>
            <input type="submit" name="inicio_sesion" value="Iniciar sesión">
        </form>

        <?php include 'config/MainFooter.php'; ?>
        <!-- JS -->
        <?php include 'config/MainJs.php'; ?>
        <script>
            // ------------------------------------------------------- //
            //   Inject SVG Sprite - 
            //   see more here 
            //   https://css-tricks.com/ajaxing-svg-sprite/
            // ------------------------------------------------------ //
            function injectSvgSprite(path) {

                var ajax = new XMLHttpRequest();
                ajax.open("GET", path, true);
                ajax.send();
                ajax.onload = function(e) {
                    var div = document.createElement("div");
                    div.className = 'd-none';
                    div.innerHTML = ajax.responseText;
                    document.body.insertBefore(div, document.body.childNodes[0]);
                }
            }
            // this is set to BootstrapTemple website as you cannot 
            // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
            // while using file:// protocol
            // pls don't forget to change to your domain :)
            injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
        </script>
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>


</body>

</html>