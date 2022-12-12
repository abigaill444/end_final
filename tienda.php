<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
<?php
    error_reporting(0);

    include "includes/config/db.php";

    $query = $link->query("SELECT * FROM articulo");
    $row = $query->fetch_assoc();

    $id = array();
    $imagen = array();
    $marca = array();
    $precio = array();
    $nombre = array();

    while ($row = mysqli_fetch_array($query)) {
        $id[$cont] = $row['id_Articulo'];
        $imagen[$cont] = $row['imagen'];
        $marca[$cont] = $row['marca'];
        $precio[$cont] = $row['precio'];
        $nombre[$cont] = $row['nombre'];
        $cont++;
    }
?>
            <div class="encabezado alterno" style="margin: 2rem; margin-top: 1.5rem !important; ">
                <a style="font-size: 26px;">Dale un giro a tu armario con la colección de ropa de diseñador en END.</a>
            </div>


            <!--contenido principal-->
            <main class="contenedor">
                <!--Inicio Productos-->
                <!--Fin Productos-->
        <div class="destacados">
                <?php
                    $cont = 1;
                    $query = $link->query("SELECT * FROM articulo LIMIT 9");

                    while($row = $query->fetch_assoc()) {
                ?>
                <section class ="destacado">
                <a href="/producto.php?action=ver&id=<?php echo $id[$cont] ?>">
                    <div class="cuadro">
                        <div class ="img-destacado">
                            <img src="imagenes/<?php echo $imagen[$cont]; ?>" alt="dest1">
                        </div>
                    </div>

                    <div class="desc-index tienda">
                        <a class="tienda-tit"><b><?php echo $marca[$cont] ?></b></a><br>
                        <a class="tienda-pr"><b>$<?php echo $precio[$cont] ?></b></a><br>
                        <p class="tienda-desc"><?php echo $nombre[$cont] ?></p>
                    </div>
                </a>
            </section>
            <?php
                $cont++;
                }
            ?>
        </div>


            </main>
            <!--fin del contenido principal-->

        </div>
    </div>

    <?php
    incluirTemplate('footer');
?>