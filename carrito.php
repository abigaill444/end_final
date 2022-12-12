<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
<?php
    include "includes/config/db.php";

    $cart = new Cart;

?>
    <br>

    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>

    <script
        src="https://www.paypal.com/sdk/js?client-id=ATZWOmFPUL3I3pjDji2ppfCDpx8yrechxhZ7EZe5kdJu8dJWuVquZ8i8qjSNHwr12sc-dYI5V3wP2MP6&currency=MXN"></script>
</head>

<body>
    <main id="main" class="contenedor sombra">
    <div class="form">
        <div class= "checkout">
            <fieldset>
                <legend> <h1>Carrito</h1> </legend>

                <?php if($cart->total_items() == 1){ ?>
                    <div class="titulo-carrito"><a>Resumen del producto</a></div>
                <?php } else {?>
                    <div class="titulo-carrito"><a>Resumen de los productos</a></div>
                <?php } ?>
                <table class="table" style="width: 100%;">
                    <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
                <tr>
                    <td>
                        <a href="/producto.php?action=ver&id=<?php echo $item["id"]; ?>">
                            <div class="carritoOut">
                            <div class="cont-img-c"><img src="imagenes/<?php echo $item["img"]?>" width="65px" height="75px" style="padding-left: 5px;" /></div>
                                <div class="check-nombre"><a><b><?php echo str_replace("`", "'", $item["name"])?></b><br>
                                <div class="check-marca">Marca: <b><?php echo $item["lbl"]; ?> </b></div>
                                <div class="check-marca">Cantidad: <b><?php echo $item["qty"]; ?></b></div></div>
                            </div>
                         </a>
                    </td>
                    <!--td>
                        <=?php echo $item["name"]; ?>
                    </td-->
                    <td>
                        <div class="center-carrito carrText"><b>
                            <?php echo 'MX$'.$item["price"]; ?></b>
                        </div>
                    </td>
                    <td>
                        <div class="center-carrito carrText">
                            
                            <input class="input-items" type="number" value="<?php echo $item['qty']; ?>" onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')">
                        </div>
                    </td>
                    <td>
                        <div class="center-carrito carrText"><b>
                            <?php echo 'MX$'.$item["subtotal"]; ?></b>
                        </div>
                    </td>
                    <td>
                        <div class="center-carrito">
                            <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" onclick="return confirm('¿Estás seguro de querer eliminar este producto de tu carrito?')">
                                <i class="bx bxs-trash cartB"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr>
                    <td colspan="5">
                        <p>Tu carrito está vacío.</p>
                    </td>
                    <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <?php if($cart->total_items() > 0){ ?>
                    <td class="text-center">Total:<strong>
                            <?php echo 'MX$'.$cart->total() ?>
                        </strong></td>
                    <?php } ?>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
            </fieldset>
            <div class="message" style="width: 400px; margin: 0 auto; margin-top: 1.5rem;">
                    <a href="/tienda.php">
                        <input style="margin-bottom: 1rem;" type="submit" value="Seguir comprando">
                    </a>
                    </div>
            <br><br>
            
    </div>
    </div>

    <div class="form">
        <div class= "checkout">
            <fieldset>
                <legend> <h1>Opciones de compra</h1> </legend>
                <div class="paypal" id="paypal-button-container">
                <script>
                    paypal.Buttons({
                        style: {
                            color: 'silver',
                            shape: 'pill',
                            label: 'pay'
                        },
                        createOrder: function (data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: <?php echo $cart->total() ?>
                                }
                            }]
                        })
                    },

                    onApprove: function(data, actions) {
                        actions.order.capture().then(function (detaller) {
                            window.location.href = "envio.php"
                        });
                    },

                    onCancel: function(data) {
                        alert("Pago cancelado. Por favor, inténtelo de nuevo.");
                        console.log(data);
                    }
                }).render('#paypal-button-container');
                </script>
            </div>
                </fieldset>
                </div>
    </div>
    <br><br>
    </main>
    </div>
</body>

<br>

<?php
    incluirTemplate('footer');
?>

</html>