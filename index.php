<!DOCTYPE html>
<html lang="es">


<?php
session_start();
require_once("./models/Usuario.php");
/* require_once("mail.php");
require_once __DIR__ . '/vendor/autoload.php'; */
?>

<head>
    <?php include 'config/MainHead.php'; ?>
</head>

<body>
    <div class="page-holder">
        <?php include 'config/MainHeader.php'; ?>
        <?php include 'config/Content.php'; ?>
        <footer class="bg-dark text-white">
            <?php include 'config/MainFooter.php'; ?>
        </footer>
        <!-- JS -->
        <?php include 'config/MainJs.php'; ?>

    </div>
    <script src="index.js"></script>
</body>

</html>