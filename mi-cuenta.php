<?php
    require 'includes/config/db.php';

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: login.php");
        exit;
    }

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

<main class= "contenedor seccion">
    <?php foreach($errores as $error): ?>
        <div class ="alerta error">
        <?php echo $error; ?>
        <?php endforeach; ?>

        <a style="display: flex; align-items: center; justify-content: center;"><?php echo $mensaje ?></a>
        <div class="form">
        <div class= "formulario">
            <fieldset>
                <legend> <h1>Mi cuenta</h1> </legend>

                <label for="nombre">Hola, <b><?php echo $_SESSION["nombre"]?></b>.</label><br><br>

                <div class="message" style="width: 70%; margin: 0 auto;">
                    <a href="/admin/propiedades/crear.php">
                        <input style="margin-bottom: 1rem;" type="submit" value="Insertar productos">
                    </a>
                    <a href="/admin/propiedades/editar.php">
                        <input style="margin-bottom: 1rem;" type="submit" value="Editar productos">
                    </a>
                    <a href="/admin/propiedades/borrar.php">
                        <input style="margin-bottom: 1rem;" type="submit" value="Eliminar productos">
                    </a>
                    <a href="/logout.php">
                        <input style="margin-bottom: 3rem;" type="submit" value="Cerrar sesión">
                    </a>
                </div>
            </fieldset>
            <br><br><br>
    </div>
    </div>
</main>

<?php
    incluirTemplate('footer');
    ?>