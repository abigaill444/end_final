<?php

$resultado = $_GET['resultado'] ?? null;

require '../includes/funciones.php';
incluirTemplate('headeralt2');

?>
<main class= "contenedor seccion">
    <h1> Administrador </h1>

    <?php
    if(intval ($resultado) === 1):?>
    <p class="alerta exito">Producto agregado correctamente</p>
    <?php endif; ?>

    <a href="http://localhost/END!/admin/propiedades/crear.php" class="message button">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>IDarticulo</th>
                <th>nombre</th>
                <th>precio</th>
                <th>marca</th>
                <th>existencia</th>
                <th>descripcion</th>
                <th>imagen</th>
                <th>acciones</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Artículo 1</td>
            <td><img src="/img/producto1.jpg"></td>
            <td>4</td>
            <td>5</td>
    </tr>
    </tbody>
    </table>
</main>

<?php
    incluirTemplate('footer');
    ?>