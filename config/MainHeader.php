<?php
// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['usu_email'])) {
    $logged_in = true;
} else {
    $logged_in = false;
}

$usuario = new Usuario;
?>
<header class="header bg-white">
    <div class="container px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" <?php if ($_SERVER['REQUEST_URI'] == "/views/Admin/") {
                                                                                                    echo 'href="../../index.php"';
                                                                                                } else {
                                                                                                    echo 'href="../index.php"';
                                                                                                }
                                                                                                ?>><span class="fw-bold text-uppercase text-dark">SNK&VAN</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link active" <?php if ($_SERVER['REQUEST_URI'] == "/views/Admin/") {
                                                                    echo 'href="../../index.php"';
                                                                } else {
                                                                    echo 'href="../index.php"';
                                                                }
                                                                ?>>Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link" <?php if ($_SERVER['REQUEST_URI'] == "/views/Admin/") {
                                                            echo 'href="../../views/shop.php"';
                                                        } else {
                                                            echo 'href="../views/shop.php"';
                                                        }
                                                        ?>>Shop</a>
                    </li>
                    <!-- Link-->
                    <!--  <li class="nav-item">
                        <a class="nav-link" href="../detail.php">Product detail</a>
                    </li> -->
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="../views/Cart/">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item"><a class="nav-link" href="cart.html"> <i class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small class="text-gray fw-normal">(0)</small></a></li>
                    <li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1"></i><small class="text-gray fw-normal"> (0)</small></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"> <i class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li> -->
                    <?php if ($logged_in) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?php if ($_SERVER['REQUEST_URI'] == "/views/Admin/") {
                                                                            echo '../../';
                                                                        } else {
                                                                            echo '../';
                                                                        }
                                                                        ?>views/Cart"> <i class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small class="text-gray fw-normal">(<?php if ($_SERVER['REQUEST_URI'] == "/index.php") {
                                                                                                                                require_once "./models/Productos.php";
                                                                                                                            } else if ($_SERVER['REQUEST_URI'] == "/views/Cart" || $_SERVER['REQUEST_URI'] == "/views/Admin/") {
                                                                                                                                require_once "../../models/Productos.php";
                                                                                                                            } else {
                                                                                                                                require_once "../models/Productos.php";
                                                                                                                            }
                                                                                                                            $products = new Productos;
                                                                                                                            $total = $products->total_cantidad();
                                                                                                                            $total_cantidad = $total[0]["total_cantidad"];
                                                                                                                            echo $total_cantidad; ?>)</small></a></li>
                        <input type="hidden" id="valor_likes" value="<?php echo $usuario->getLikes($_SESSION["usu_id"])['likes']  ?>">
                        <li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1 text-gray"></i>Favorites<small id="num-favoritos" class="text-gray fw-normal"><?php echo '( ' . $usuario->getLikes($_SESSION["usu_id"])['likes'] . ' )'  ?></small></a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="perfil.php"> <i class="fas fa-user me-1 text-gray fw-normal"></i>My account</a></li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="../views/perfil.php" id="navbarDropdown" role="button">
                                <i class="fas fa-user-circle me-1 text-gray fw-normal"></i>My account
                            </a>
                        </li>
                        <li>
                            <form action="../logout.php " method="POST">
                                <button type="submit" name="logout" class="dropdown-item"><i class="fa-solid fa-power-off"></i></button>
                            </form>
                        </li>

                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link" href="../login.php"> <i class="fas fa-user-circle me-1 text-gray fw-normal"></i>Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</header>