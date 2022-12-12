<?php
    require 'includes/funciones.php';
    incluirTemplate('header');

    include "includes/config/db.php";

    if(!isset($_REQUEST['id'])){
        header("Location: index.php");
    }
?>
    <script
        src="https://www.paypal.com/sdk/js?client-id=ATZWOmFPUL3I3pjDji2ppfCDpx8yrechxhZ7EZe5kdJu8dJWuVquZ8i8qjSNHwr12sc-dYI5V3wP2MP6&currency=MXN"></script>

<body>
    <main class="contenedor sombra">
    <div class="form <?php echo $style; ?>">
    <form class="formulario" method='post' action='fpdf/generarRecibo.php?id=<?php echo $_GET['id']; ?>&userID=<?php echo $_GET['userID']; ?>'>
            <fieldset>
                <legend> <h1>Orden recibida</h1> </legend><br>
        <?php if(!empty($_GET['userID'])){
                $query = $link->query("SELECT * FROM cliente WHERE id_Cliente = ".$_SESSION['sessCustomerID']);
                        while($row = $query->fetch_assoc()) {
                            $nombre = $row['nombre'];
                            $apellido = $row['apellido'];
                            $email = $row['email'];
                            $telefono = $row['telefono'];
                            $calle = $row['calle'];
                            $ciudad = $row['ciudad'];
                            $estado = $row['estado'];
                            $cp = $row['cp'];
        ?>
        <a>Estimado <b><?php echo $nombre." ".$apellido; ?></b>, </a><br><br>
        <a>Su orden acaba de ser procesada exitosamente.</a><br><br>
        <a>En un lapso no mayor a 24 horas estará recibiendo su número de paquetería en el correo electrónico proporcionado para la recepción de su(s) producto(s).</a><br><br>
        <a>El ID de su orden es el <b>#<?php echo $_GET['id']; ?></b>.</a><br><br><br>
        <div class="message">
                <input type="submit" value="Ver recibo generado" style="margin-bottom: 2rem">
            </div><br>
        <?php
        }}?>
    </form>

            </fieldset>
    </div>
    <br>
    </div>
    </main>
    </div>
</body>

<br><br>

<?php
    incluirTemplate('footer');
?>