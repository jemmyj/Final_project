<!DOCTYPE html>
<html lang="es">

<?php
require_once '../../models/Usuario.php';
?>

<head>
    <?php include '../../config/MainHead.php'; ?>
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
        <?php include '../../config/MainHeader.php'; ?>
        <div class="container">
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="h2 text-uppercase mb-0">Register</h1>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                    <li class="breadcrumb-item"><a class="text-dark" href="../index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--  Content -->
            <form id="register-form" action="/index.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br>
                <label for="correo">Email:</label>
                <input type="email" id="correo" name="correo"><br>
                <label for="contrasena">Password:</label>
                <input type="password" id="contrasena" name="contrasena"><br>
                <a href="../../login.php">You have account?</a>
                <br>
                <input type="submit" name="register" value="Register">
            </form>
        </div>
        <footer class="bg-dark text-white">
            <?php include '../../config/MainFooter.php'; ?>
        </footer>
        <!-- JS -->
        <?php include '../../config/MainJs.php'; ?>

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
    <script src="/views/Registrar/registrar.js"></script>

</body>

</html>