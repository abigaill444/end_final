<?php
    //conectar a DB 
    include '../../includes/config/db.php';
    session_start();

    $mensaje = '';

    $query = $link->query("SELECT * FROM articulo");
    $row = $query->fetch_assoc();

    require '../../includes/funciones.php';
    incluirTemplate('headeralt');
?>

<script language="javascript">
            function activa_boton(campo,boton){
                if (campo.value != "0"){
                    boton.disabled=false;
                } else {
                    boton.disabled=true;
                }
            }
        </script> 

<main class= "contenedor seccion">
        <?php
            $id = $_POST['articulo'];

            if(!empty($id)){
                $query = $link->query("SELECT * FROM articulo where id_Articulo = ".$id);

                while($row = $query->fetch_assoc()) {
                    $id = $row['id_Articulo'];
                    $nombre = $row['nombre'];
                    $precio = $row["precio"];
                    $marca = $row["marca"];
                    $existencia = $row["existencia"];
                    $descripcion = $row["descripcion"];
                    $imagen = $row["imagen"];
                }
                $style = "visible";
            }             
        ?>

        <form method="post" class="<?php echo $style ?>" action="actualizarAction.php" >
            <fieldset>
                <legend> <h1>Actualizar artículo</h1> </legend><br>
                <div>
                    <label for="nombre"><b> Nombre: </b></label>&nbsp;&nbsp;&nbsp;
                    <input type = "text" id = "nombre" name ="nombre" value = "<?php echo $nombre; ?>"><br><br>

                    <label for="precio"><b>  Precio: </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type = "number" id = "precio" name="precio" value = "<?php echo $precio; ?>"><br><br>

                    <label for="marca"><b>  Marca: </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type = "text" id = "marca" name="marca" value = "<?php echo $marca; ?>"><br><br>

                    <label for="existencia"><b>  Existentes: </b></label>
                    <input type = "number" id = "existencias" name="existencias" value = "<?php echo $existencia; ?>"><br><br>

                    <label for="descripcion"><b>  Descripción: </b></label><br><br>
                    <textarea id="descripcion" name="descripcion" style="width: 270px; height: 100px"><?php echo $descripcion; ?></textarea><br><br>

                    <label for="imagen"><b>  Imagen: </b></label><br>
                    <input type = "file" id = "imagen" accept="image/jpeg, image/png" name="imagen" ><br><br>
              

                <div class="message" style="width: 270px; margin: 0 auto">
                    <input type="submit" style="margin-bottom: 2rem" value="Actualizar">
                </div>                </div>
            </fieldset>
        </form>
    </div>
    <br><br><br>
</main>

<script language="javascript">
    function activa_boton(campo,boton){
        if (campo.value != "0"){
            boton.disabled=false;
        } else {
            boton.disabled=true;
        }
    }
</script> 

<?php
    incluirTemplate('footer');
?>