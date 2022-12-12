<?php
    include 'cart.php';
    require 'includes/funciones.php';
?>
<?php
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: mi-cuenta.php");
    }
    
    require_once "includes/config/db.php";
    
    $username = $password = $nombre = $su = "";
    $username_err = $password_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if(empty(trim($_POST["username"]))){
            $username_err = "Por favor, introduce un usuario.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        if(empty(trim($_POST["password"]))){
            $password_err = "Por favor, introduce una contraseña.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        if(empty($username_err) && empty($password_err)){
            $sql = "SELECT id_Cliente, usuario, contrasena, nombre, su FROM cliente WHERE usuario = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                $param_username = $username;
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $nombre, $su);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                session_start();
                                
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;   
                                $_SESSION["nombre"] = $nombre;      
                                $_SESSION["su"] = $su;                        
                                
                                header("location: index.php");
                            } else{
                                $password_err = "La contraseña ingresada es incorrecta. Por favor, vuelve a intentarlo.";
                            }
                        }
                    } else{
                        $username_err = "No se encontró la cuenta. Por favor, vuelve a intentarlo.";
                    }
                } else{
                    echo "Algo salió mal. Por favor, vuelve a intentarlo.";
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | END.</title>
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

 <link rel="stylesheet" href="CSS/styles.css">
 <link rel="stylesheet" href="CSS/stylesC.css">
    <div class="container-form sign-in">
        <form class="formulario reg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2 class="create-account">Iniciar sesión</h2>
            <input type="text" placeholder="Usuario" name="username">
            <input type="password" placeholder="Contraseña" name="password">
            <div class="message">
                <button type="submit" class="sign-in-btn">Inicia sesión</button>
            </div>
        </form>
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido de nuevo</h2>
                <p>Si aun no tienes una cuenta, regístrate aquí.</p>
                <a href="registro.php"><button>Regístrate</button> </a>
            </div>
        </div> 
    </div>
  
</body>

<?php
    incluirTemplate('footer');
?>