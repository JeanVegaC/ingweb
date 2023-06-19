<?php
include '../controlers/validateLogin.php';
validarSesion();

include '../controlers/validateRol.php';
$rol = validarRol();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="../style/home.css">
    <title>Document</title>
</head>

<body>
    <main id="home">
        <nav class="nav-home">
            <a href="#">
                <i class="logo uil uil-car"></i>
            </a>
            <ul class="ul-links">
                <li class="li-link">
                    <a href="#">
                        <i class="uil uil-estate"></i>
                        <span>Home</span>
                    </a>
                </li>
                <?php
                if ($rol == 'cliente') {
                ?>
                    <li class="li-link">
                        <a href="./products/products.php">
                            <i class="uil uil-tag"></i>
                            <span>Products</span>
                        </a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="li-link">
                        <a href="./logistics/logistics.php">
                            <i class="uil uil-tag"></i>
                            <span>Logistic</span>
                        </a>
                    </li>
                <?php
                }
                ?>
                <li class="logout li-link">
                    <a href="../controlers/logout.php">
                        <i class="uil uil-signout"></i>
                        <span>Log out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <section class="section-home">
            <header class="header-title">
                <h2>Empresa Multiservicio de automoviles</h2>
                <h1>FAGHAM <span>S.A.C</span></h1>
            </header>
            <!-- buscador de fhagam -->
            <div class="input-searchProduct">
                <form action="" method="post" id="" class="buscador-1">
                    <input type="text" name="buscar" id="bus" placeholder="¿Que producto estás buscando?" />
                    <span class="button-search">
                        <i class="uil uil-search"></i>
                    </span>
                </form>
            </div>
            <ul class="ul-services">
                    <li class="li-service">
                        <i class="uil uil-tag"></i> 
                        <span>Venta de repuestos</span>
                    </li>
                    <li class="li-service">
                        <i class="uil uil-constructor"></i>
                        <span>Mantenimiento</span>
                    </li>
                    <li class="li-service">
                        <i class="uil uil-wrench"></i>
                        <span>Reparaciones</span>
                    </li>
                </ul>
        </section>
        <section class="section-about">
                <header>
                    <h2>Sobre nosotros</h2>
                </header>
                <ul class="ul-about">
                    <li class="li-about">
                        <span>Ubicación</span>
                        <i class="uil uil-globe"></i>
                        <p>Nos encontramos ubicados En Huarochiri-Chosica Santa Eulalia bla bla bla</p>
                    </li>
                    <li class="li-about">
                        <span>Que ofrecemos</span>
                        <i class="uil uil-lightbulb-alt"></i>
                        <p>Actualmente ofrecemos el servicio de inventario de autopartes para
                            tu vehiculo</p>
                    </li>
                    <li class="li-about">
                        <span>¿Por que elegirnos?</span>
                        <i class="uil uil-user-check"></i>
                        <p>Porque brindamos una ardua variedad de productos de distintos años y mantenimientos con personas de ala calidad para mayor rendimiento y ahorro en tu vehiculo</p>
                    </li>
                </ul>
        </section>
        <section class="section-brands">
            <header>
                <h2>Marcas que confian en nosotros</h2>    
            </header>
            <ul class="ul-brands">
                <li class="li-brand">
                    <img src="../assets/brand-frenosa.png"></img>
                </li>
                <li class="li-brand">
                    <img src="../assets/brand-incolbest.png"></img>
                </li>
                <li class="li-brand">
                    <img src="../assets/brand-todofrenos.png"></img>
                </li>
                <li class="li-brand">
                    <img src="../assets/brand-stp.png"></img>
                </li>
               
            </ul>
        </section>

        <!-- informacion de la empresa -->

        <footer></footer>
    </main>

</body>

</html>