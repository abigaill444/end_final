<?php
    include '../../includes/config/db.php';

    $id = $_POST['id'];

    $sql = "DELETE FROM articulo WHERE id_Articulo = ".$id;

    if($stmt = mysqli_prepare($link, $sql)){
        if(mysqli_stmt_execute($stmt)){
            header("location: borrar.php");
            echo "Producto borrado exitosamente.";
        } else{
            echo "Algo salió mal. Por favor, inténtalo de nuevo.";
        }
        header("location: borrar.php");
    }
?>