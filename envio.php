<?php
    require 'includes/funciones.php';
    incluirTemplate('header');

    include "includes/config/db.php";
    $cart = new Cart;


    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
    } else {
        $_SESSION['sessCustomerID'] = $_SESSION["id"];

        $query = $link->query("SELECT * FROM cliente WHERE id_Cliente = ".$_SESSION['sessCustomerID']);
        $custRow = $query->fetch_assoc();
    }

    if($cart->total_items() <= 0){
        header("Location: index.php");
    }
?>
    <script
        src="https://www.paypal.com/sdk/js?client-id=ATZWOmFPUL3I3pjDji2ppfCDpx8yrechxhZ7EZe5kdJu8dJWuVquZ8i8qjSNHwr12sc-dYI5V3wP2MP6&currency=MXN"></script>

<body>
    <main class="contenedor sombra">
    <div class="form <?php echo $style; ?>">
        <form class= "formulario" id="form1" name="signup-form" method="post" action="cartAction.php?action=placeOrder">
            <fieldset>
                <legend> <h1>Datos para el envío</h1> </legend><br>

                <?php 
                    if(!empty($_SESSION['sessCustomerID'])){
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
                        }
                    }
                ?>

                <label><b> Nombre: </b></label>&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "nombre" name ="nombre" value = "<?php echo $nombre; ?>"><br><br>

                <label><b>Apellido: </b></label>&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "apellido" name="apellido" value = "<?php echo $apellido; ?>"><br><br>

                <label><b>Email:</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "email" name="email" value = "<?php echo $email; ?>"><br><br>

                <label><b>Teléfono:</b></label>&nbsp;&nbsp;
                <input type = "text" id = "telefono" name="telefono" value = "<?php echo $telefono; ?>"><br><br>

                <label><b>Dirección:</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                <textarea id = "calle" name="calle" style="width: 270px; height: 100px"><?php echo $calle; ?></textarea><br><br>

                <label><b>Ciudad:</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "ciudad" name="ciudad" value = "<?php echo $ciudad; ?>"><br><br>

                <label><b>C.P.:</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "cp" name="cp" value = "<?php echo $cp; ?>"><br><br>

                <label><b>Estado:</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" id = "estado" name="estado" value = "<?php echo $estado; ?>"><br><br><br>

            </fieldset>
            <br>
            <div class="message">
                <input type="submit" value="Realizar pedido" style="margin-bottom: 2rem">
            </div>
        </form>
    </div>
    </div>
    </main>
    </div>
</body>

<br><br>

<?php
    incluirTemplate('footer');
?>