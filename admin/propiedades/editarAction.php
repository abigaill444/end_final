<?php
    include '../../includes/config/db.php';

    $id = $_POST['id'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $marca = $_POST['marca'];
    $existencia = $_POST["existencia"];
    $descripcion = $_POST["descripcion"];
    $imagen = $_FILES['imagen'];

    $carpetaImagenes = '../../imagenes/';
    if(!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
    }

    $nombreImagen = md5( uniqid( rand(), true ) ).".jpg";

    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

    $sql = "UPDATE articulo SET nombre='".$nombre."', precio='".$precio."', marca='".$marca."', existencia='".$existencia."', existencia='".$existencia."', descripcion='".$descripcion."', imagen='".$nombreImagen."' WHERE id_Articulo = ".$id;

    if($stmt = mysqli_prepare($link, $sql)){
        if(mysqli_stmt_execute($stmt)){
            header("location: editar.php");
            echo "Producto editado exitosamente.";
        } else{
            echo "Algo salió mal. Por favor, inténtalo de nuevo.";
        }
        header("location: editar.php");
    }