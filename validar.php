<?php

include('db.php');

$correo=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

$consulta = "SELECT * FROM login where correo = 'correo' and contraseña = 'contraseña' ";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if($filas ) {
    header(location: "index.html");
} else {
    include ("index.html");
    ?>
    <h1> ERROR DE AUTENTICACIÓN </h1>
    <?php
}
mysqli_fre_result($resultado);
mysqli_close($conexion);


?>