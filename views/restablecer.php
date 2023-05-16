<?php
require_once('../models/Usuario.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../config/MainHead.php'; ?>
    <style>
        form {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            max-width: 480px;
            padding: 32px;
            margin-top: 50px;
            margin-bottom: 76px;
        }

        label {
            display: block;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
        }

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

        input[type="submit"]:hover {
            background-color: #0069d9;
        }

        p.error {
            color: #ff0000;
            font-size: 14px;
            margin-top: 8px;
        }

    </style>
</head>

<body>
    <div class="page-holder">
        <?php include '../config/MainHeader.php'; ?>
        <div class="container">
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="h2 text-uppercase mb-0">Reset password</h1>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                    <li class="breadcrumb-item"><a class="text-dark" href="../">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            if (isset($_POST['enviar'])) {
                $correo = $_POST['correo'];

                $user = new Usuario;
                $result = $user->verifyUser($correo);

                if ($result) {

                    echo '<form action="restablecer.php" method="POST">';
                    echo '<h1>Please, introduce your new password!</h1> ';
                    echo '<label for="contrasena">New password:</label>';
                    echo '<input type="password" id="contrasena" name="contrasena"><br>';
                    echo '<input type="hidden" name="correo" value="' . $correo . '">';
                    echo '<input type="submit" name="restablecer" value="Confirm">';
                    echo '</form>';
                } else {
                    echo '<p class="error">Lo siento, no se encontró una cuenta asociada con ese correo electrónico. Inténtalo de nuevo.</p>';
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['restablecer'])) {
                $contrasena = $_POST['contrasena'];
                $correo = $_POST['correo'];

                $user = new Usuario;
                $user->updatePassword($correo, $contrasena);

                echo '<form>';
                echo '<h1>You just reset your password!</h1> ';
                echo '<br> <br>';
                echo '<h3>Hope you can enjoy in SNK VAN!</h3> ';
                echo '</form>';
            }
            ?>
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