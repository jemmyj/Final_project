<!DOCTYPE html>
<html lang="es">

<?php
session_start();
require_once("../models/Usuario.php");
$rol = $_SESSION["usu_rol"];

// Crear una instancia de la clase Productos
$usuarios = new Usuario();
$id_usuario = $_SESSION['usu_id']; // obtener el id del usuario guardado en la sesión

// Obtener los datos de los productos
$resultado = $usuarios->getUser($id_usuario);

?>

<head>
    <?php include '../config/MainHead.php';; ?>
</head>
<style>
    body {
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

    #perfil {

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

    #Guardar,
    #Editar,
    #admin,
    #cancelar {
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
                            <h1 class="h2 text-uppercase mb-0">My account</h1>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                    <li class="breadcrumb-item"><a class="text-dark" href="../">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <div class="form-container">
                <form id="perfil" action="login.php" method="POST">
                    <h2 id="perfil_title">Click Edit to change information</h2>
                    <br>
                    <label for="nombre">Name:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $resultado['nombre']; ?>" disabled><br><br>
                    <label for="correo">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $resultado['correo']; ?>" disabled><br><br>
                    <label for="contrasena">Password:</label>
                    <input type="password" id="contrasena" name="contrasena" value="<?php echo $resultado['contrasena']; ?>" disabled><br><br>
                    <input type="button" onclick="cancelarEdit()" class="d-none" name="cancelar" id="cancelar" value="Cancelar">
                    <a href="/views/Admin/"> <input type="button" class="<?php if ($rol == 0) {
                                                                                echo "d-none";
                                                                            } ?>" name="admin" id="admin" value="Manage"></a>
                    <input type="button" onclick="editar()" name="Editar" id="Editar" value="Edit">
                    <input type="submit" class="d-none" name="Guardar" id="Guardar" value="Save changes">
                </form>

                <!-- <form action="logout.php" method="POST">
                    <button type="submit" name="logout" class="btn btn-primary mt-3">Logout</button>
                </form> -->
            </div>
        </div>
        <footer class="bg-dark text-white">
            <?php include '../config/MainFooter.php'; ?>
        </footer>
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
    <script src="../views/perfil.js"></script>

</body>

</html>