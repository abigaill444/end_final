<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
<?php
    error_reporting(0);

    include "includes/config/db.php";

    if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
        if($_REQUEST['action'] == 'ver' && !empty($_REQUEST['id'])){
            $id = $_REQUEST['id'];

            $query = $link->query("SELECT * FROM articulo WHERE id_Articulo = ".$id);
            $row = $query->fetch_assoc();

            if($row === null) {
                header("Location: 404.html");
            }
            
            $imagen = $row['imagen'];
            $nombre = $row['nombre'];
            $existencia = $row['existencia'];
            $marca = $row['marca'];
            $precio = $row['precio'];
            $descripcion = $row['descripcion'];
        } else {
            header("Location: 404.html");
        }
    } else {
        header("Location: 404.html");
    }

?>
            <!--contenido principal-->
            <main class="contenedor">
                <!--Inicio Productos-->
                <!--Fin Productos-->
            <?php
                $query = $link->query("SELECT * FROM articulo WHERE id_Articulo = $id");
                if($query->num_rows > 0) { 
                    while($row = $query->fetch_assoc()) {
            ?>
            <div class="contenido-producto">
                <div class="imagen-productoP">
                    <img class="imagen-producto-img" name="cover" src="imagenes/<?php echo $imagen; ?>" />
                </div>
                <div class="descripcion-producto">
                    <div class="producto-nombre">
                        <a><?php echo $nombre ?></a>
                    </div>
                    <div class="producto-precio marca">
                        <a>Producto de <?php echo $marca ?></a>
                    </div>
                    <div class="producto-precio">
                        <a><b>$<?php echo $precio ?></b></a>
                    </div>
                    <div class="producto-precio cantidad">
                        <a><b>Cantidad: </b></a>&nbsp;
                        <input class="input-items" style="padding-left: 0.2rem" type="number" value="1" onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')">
                    </div>
                    <div class="producto-precio disponibles">
                        <a>(<b><?php echo $existencia ?></b> disponibles)</a>
                    </div>
                    <div class="anadir">
                        <a href="cartAction.php?action=addToCart&id=<?php echo $row["id_Articulo"]; ?>"><button>Agregar al carrito</button></a>
                    </div>
                    <div class="producto-precio descripcion">
                        <a><b>Descripción: </b><br><?php echo str_replace("\n", "<br>", $descripcion) ?></a>
                    </div>
                    <br><br><br><br>
                </div>
            </div>
            <?php } 
                }
            ?>

            </main>
            <!--fin del contenido principal-->

        </div>
    </div>

    <?php
    incluirTemplate('footer');
?>