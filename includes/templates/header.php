<?php
    include 'cart.php';

    $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    
    switch ($page) {
        case 'index.php':
              $page_title = 'END. -  El destino global para la moda de lujo';
        break;

        case 'login.php':
              $page_title = 'Iniciar sesión | END.';
        break;

        case 'registro.php':
            $page_title = 'Registro | END.';
        break;

        case 'tienda.php':
            $page_title = 'Productos | END.';
        break;

        case 'mi-cuenta.php':
            $page_title = 'Mi cuenta | END.';
        break;

        default:
              $page_title = 'END.';
        break;
    } 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$page_title?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styless2.css">
    <link rel="stylesheet" href="CSS/normalize.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link href="css/flexslider.css" rel="stylesheet" />
   
</head>
<body>
    
    <header class="header">
        <div class="menu">
        <a class="icono-login" href="carrito.php">
                <i class='bx bxs-cart'></i>
                <span class="carrito">
                    <?php 
                        $cart = new Cart;
                        echo $cart->total_items() 
                    ?>
                </span>
            </a>
            <a href="index.php">
                <img class="logo" src="img/logo.png" alt="logo" class="logo-img" >
            </a>
            <a class="icono-login" href="login.php">
                <i class='bx bxs-user'></i>
            </a>
            <button id="button-menu" class="button-menu" >
                <span></span>
                <span></span>
                <span></span>
            </button>
            </a> 
        </div>

        <nav id="nav" class="main-nav" >
            <div class="nav-links" >
                <a class="link-item" href="/index.php">Inicio</a>
                <a class="link-item" href="/tienda.php">Tienda</a>
                <a class="link-item" href="/nosotros.php">Nosotros</a>
                <a class="link-item" href="/contacto.php">Contacto</a>
            </div>
        </nav>
    </header>
