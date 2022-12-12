<?php

//conectar a DB 
require '../../includes/config/db.php';

//Arreglo con mensajes de errores
$errores = [];

$nombre = '';
$precio = '';
$marca = '';
$existencias = '';
$descripcion = '';
$mensaje = '';

//ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER ['REQUEST_METHOD']=='POST'){
    //echo"<pre>";
    //var_dump($_POST);
    //echo"</pre>";

    //echo"<pre>";
    //var_dump($_FILES);
    //echo"</pre>";

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $existencias = $_POST['existencias'];
        $descripcion = $_POST['descripcion'];

        //Asignar files a una variable

        $imagen = $_FILES['imagen'];

        

        if(!$nombre){
            $errores[] = "Debes añadir un nombre para el artículo";
        }
        if(!$precio){
            $errores[] = "El precio es obligatorio";
        }
        if(!$marca){
            $errores[] = "Debe ingresar la marca del artículo";
        }
        if(!$existencias){
            $errores[] = "Ingrese el número de artículos existentes";
        }
        if(strlen ($descripcion)<50){
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$imagen['name'] || $imagen ['error']){
            $errores[] = 'La imagen es obligatoria ';
        }

        //validar por tamaño
        $medida= 1000 * 1000;

        if ($imagen['size'] > $medida){
            $errores[] = 'La imagen es muy pesada';
        }

            //echo"<pre>";
            //var_dump($errores);
            //echo"</pre>";
    
            //Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                //Subida de archivos
                //crear carpeta
                $carpetaImagenes = '../../imagenes/';

                if(!is_dir($carpetaImagenes)){
                    mkdir($carpetaImagenes);
                }
                //Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ).".jpg";

                //subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                
            
                //Insertar en la base de datos
        $query = "INSERT INTO articulo (nombre, precio, marca, existencia, descripcion, imagen) 
        VALUES ('$nombre','$precio', '$marca', '$existencias', '$descripcion', '$nombreImagen')";

        //echo $query;

        $resultado = mysqli_query($link, $query);

        if($resultado){
            $mensaje = "Artículo insertado correctamente.";
        } else {
            $mensaje = "Ocurrió un error. Inténtelo de nuevo.";
        }
    }
}

require '../../includes/funciones.php';
incluirTemplate('headeralt');
?>

<main class= "contenedor seccion">
    <?php foreach($errores as $error): ?>
        <div class ="alerta error">
        <?php echo $error; ?>
        <?php endforeach; ?>

        <a style="display: flex; align-items: center; justify-content: center;"><?php echo $mensaje ?></a>
        <div class="form">
        <form class= "formulario" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" >
            <fieldset>
                <legend> <h1>Insertar artículo</h1> </legend><br>

                <label for="nombre"><b> Nombre: </b></label>&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "nombre" name ="nombre" placeholder="Hoodie estampada con telaraña" value = "<?php echo $nombre; ?>"><br><br>

                <label for="precio"><b>  Precio: </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "number" id = "precio" name="precio" placeholder="$2000" value = "<?php echo $precio; ?>"><br><br>

                <label for="marca"><b>  Marca: </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "marca" name="marca" placeholder="Palm Angels" value = "<?php echo $marca; ?>"><br><br>

                <label for="existencia"><b>  Existentes: </b></label>
                <input type = "number" id = "existencias" name="existencias" placeholder="200" value = "<?php echo $existencias; ?>"><br><br>

                <label for="descripcion"><b>  Descripción: </b></label><br><br>
                <textarea id="descripcion" name="descripcion" style="width: 270px; height: 100px"><?php echo $descripcion; ?></textarea><br><br>

                <label for="imagen"><b>  Imagen: </b></label><br>
                <input type = "file" id = "imagen" accept="image/jpeg, image/png" name="imagen" ><br><br>

            </fieldset>
            <br>
        <div class="message">
            <input type="submit" value="Guardar">
        </div>
    </form>
    </div>
</main>

<?php
    incluirTemplate('footer');
    ?>