<?php
    error_reporting(0);
    include '../../includes/config/db.php';
    session_start();

    $mensaje = "";

    $query = $link->query("SELECT * FROM articulo");
    $row = $query->fetch_assoc();

    require '../../includes/funciones.php';
    incluirTemplate('headeralt');
?>

<main class="contenedor seccion">
    <a style="display: flex; align-items: center; justify-content: center;"><?php echo $mensaje ?></a>
        <div class="form" style="display: block">
            <form class="formulario" style="margin: 0 auto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="producto" id="producto">
            <fieldset>
            <legend> <h1>Actualizar artículo</h1> </legend><br>

            <select name="producto" style="width: 270px; margin-bottom: 2rem;">
            <option value="0" selected>Seleccione...</option>
        
            <?php
                $style = "ocultar";
                $query = $link->query("SELECT * FROM articulo");
                while($row = $query->fetch_assoc()) {
                        echo '<option value="'.$row["id_Articulo"].'">'.$row["id_Articulo"]." - ".$row["nombre"].'</option>';
                }
            ?>
            </select>
            <br>
            </fieldset>

            <div class="message" style="width: 100%; margin: 0 auto; margin-top: 1rem;">
                <input type="submit" value="Enviar" style="margin-bottom: 1rem"><br><br>
                </div>
            </form>

            <?php
                $id = $_POST['producto'];
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
                    $style = "";
                }    
            ?>
    <script>
        $(document).ready(function(){
            $(".boton").click(function(){
                var valores="";
                $(this).parents("tr").find("#nombre").each(function(){
                    valores+=$(this).html()+"\n";
                });
                console.log(valores);
                alert(valores);
            });
        });
    </script>

    <div class="form <?php echo $style; ?>">
        <form class= "formulario" method="POST" action="editarAction.php" enctype="multipart/form-data" >
            <fieldset>
                <legend> <h1>Propiedades</h1> </legend><br>

                <label for="nombre"><b> ID único: </b></label>&nbsp;&nbsp;&nbsp;
                <input readonly type = "text" id = "id" name ="id" value = "<?php echo $id; ?>"><br><br>

                <label for="nombre"><b> Nombre: </b></label>&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "nombre" name ="nombre" value = "<?php echo $nombre; ?>"><br><br>

                <label for="precio"><b>  Precio: </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "number" id = "precio" name="precio" value = "<?php echo $precio; ?>"><br><br>

                <label for="marca"><b>  Marca: </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "marca" name="marca" value = "<?php echo $marca; ?>"><br><br>

                <label for="existencia"><b>  Existentes: </b></label>
                <input type = "number" id = "existencia" name="existencia" value = "<?php echo $existencia; ?>"><br><br>

                <label for="descripcion"><b>  Descripción: </b></label><br><br>
                <textarea id="descripcion" name="descripcion" style="width: 270px; height: 100px"><?php echo $descripcion; ?></textarea><br><br>

                <label for="imagen"><b>  Imagen: </b></label><br><br>
                <img name="cover" src="../../imagenes/<?php echo $imagen; ?>"  width="200" /><br><br>
                <input type = "file" id = "imagen" accept="image/jpeg, image/png" name="imagen" ><br><br>

            </fieldset>
            <br>
            <div class="message">
                <input type="submit" value="Guardar" style="margin-bottom: 2rem">
            </div>
        </form>
    </div>
    <br><br>
</main>

<?php
    incluirTemplate('footer');
?>