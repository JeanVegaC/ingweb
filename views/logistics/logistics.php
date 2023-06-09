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
    <link rel="stylesheet" href="../../style/logistics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>

<body>
    <main>
        <nav class="nav-home">
            <a href="../../index.php">
                <i class="logo uil uil-car"></i>
            </a>
            <ul class="ul-links">
                <li class="li-link">
                    <a href="../../index.php">
                        <i class="uil uil-estate"></i>
                        <span>Home</span>
                    </a>
                </li>
                <?php
                if ($rol && $rol == 'vendedor') {
                ?>
                    <li class="li-link">
                        <a href="#">
                            <i class="uil uil-tag"></i>
                            <span>Logistic</span>
                        </a>
                    </li>
                <?php
                }else{
                ?>
                    <li class="li-link">
                        <a href="./views/products/products.php">
                            <i class="uil uil-tag"></i>
                            <span>Products</span>
                        </a>
                    </li>
                <?php
                }
                ?>
                <?php
                if ($rol) {
                ?>
                <li class="logout li-link">
                    <a href="../../controlers/logout.php">
                        <i class="uil uil-signout"></i>
                        <span>Log Out</span>
                    </a>
                </li>
                <?php
                }else{
                ?>
                <li class="logout li-link">
                    <a href="./views/login/login.php">
                        <i class="uil uil-signout"></i>
                        <span>Log In</span>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </nav>
        <section class="logistics-section" id=="logistics-section">
            <table id="ventasTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Detalle</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>
        <section class="grafics-section">
            <h1>Gráfico de ventas diarias y mensuales</h1>
            <div class="grafics-container">
                <canvas id="myChart1"></canvas>
                <canvas id="myChart2"></canvas>
            </div>
        </section>
    </main>
    <script src="mapSales.js" type="module"></script>
    <script src="grafics.js" type="module"></script>
    
</body>

</html>