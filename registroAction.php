<?php
    require_once "includes/config/db.php";

    $nombre = $_POST["nombre"]; 
    $apellido = $_POST["apellido"]; 
    $usuario = $_POST["usuario"]; 
    $password = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    $correo = $_POST["correo"]; 
 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "INSERT INTO cliente (usuario, contrasena, nombre, apellido, email, su) VALUES ('$usuario', '$password', '$nombre', '$apellido', '$correo', '0')";
         
        mysqli_query($link, "SELECT * FROM cliente"); 
        mysqli_query($link, $sql); 
        mysqli_close($link); 

        header("location: login.php");
    }
?>