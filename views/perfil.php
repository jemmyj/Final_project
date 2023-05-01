<!DOCTYPE html>
<html lang="es">

<?php
session_start();
include '../config/MainHead.php';
require_once("../models/Usuario.php");


// Crear una instancia de la clase Productos
$usuarios = new Usuario();
$id_usuario = $_SESSION['usu_id']; // obtener el id del usuario guardado en la sesión

// Obtener los datos de los productos
$resultado = $usuarios->getUser($id_usuario);

?>

<body>
    <div class="page-holder">
        <?php include '../config/MainHeader.php'; ?>
        <div class="container">
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="h2 text-uppercase mb-0">My account</h1>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                    <li class="breadcrumb-item"><a class="text-dark" href="../index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <div class="form-container">
                <form action="#" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $resultado['nombre']; ?>"><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $resultado['correo']; ?>"><br><br>

                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" value="<?php echo $resultado['contrasena']; ?>"><br><br>

                    <input type="submit" value="Guardar cambios">
                </form>

                <!-- <form action="logout.php" method="POST">
                    <button type="submit" name="logout" class="btn btn-primary mt-3">Logout</button>
                </form> -->
            </div>
        </div>
        <?php include '../config/MainFooter.php'; ?>
        <!-- JS -->
        <?php include '../config/MainJs.php'; ?>
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