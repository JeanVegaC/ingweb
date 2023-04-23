<?php	
include '../../controlers/validateLogin.php';
 validarSesion();

include '../../controlers/validateRol.php';
 $rol = validarRol();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="../../style/products.css">
    <link rel="stylesheet" href="../../style/nav.css">
    <title>Document</title>
</head>
<body>
    <main>
        <nav class="nav-home">
            <ul class="ul-links">
                <li class="li-link">
                    <a href="../home.php">
                        <i class="uil uil-estate"></i>
                        <span>Home</span>
                    </a>
                </li>
                <?php
                if($rol == 'cliente'){
                    ?>
                    <li class="li-link">
                <a href="./products.php">
                    <i class="uil uil-tag"></i>
                    <span>Productos</span>
                </a>
                </li>
                <li>
                    <p><a href="../../controlers/logout.php">Cerrar sesión</a></p>
                </li>
            <?php
                }else {                    
                    ?>
                    <li class="li-link">
                <a href="">
                    <i class="uil uil-tag"></i>
                    <span>Logistic</span>
                </a>
                </li>
                    <?php
                }
                    ?>
            </ul>
        </nav>
    <section class="products-section">
        <div class="product-container">
        <h1>Selecciona los productos que deseas</h1>
        <div class="filter">
            <ul class="ul-filters">
                <li class="li-filter filter-active" id="filter-all">
                    <span>All</span>
                </li>
                <li class="li-filter" id="filter-frenos" >
                    <span>Freno</span>
                </li>
                <li class="li-filter" id="filter-pastilla">
                    <span>Pastilla</span>
                </li>
            </ul>
        </div>
    
        <div class="products" id="products-container">
  </div>
</div>

        </div>
    </section>
    </main>
<script src="mapProducts.js"></script>    
</body>
</html>