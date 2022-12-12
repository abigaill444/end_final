<?php
// initialize shopping cart class
include 'cart.php';
$cart = new Cart;

// include database configuration file
include "includes/config/db.php";

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $link->query("SELECT * FROM articulo WHERE id_Articulo = ".$productID);
        $row = $query->fetch_assoc();

        $itemData = array(
            'id' => $row['id_Articulo'],
            'name' => $row['nombre'],
            'price' => $row['precio'],
            'lbl' => $row['marca'],
            'stock' => $row['existencia'],
            'desc' => $row['descripcion'],
            'img' => $row['imagen'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'carrito.php':'carrito.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: carrito.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $insertOrder = $link->query("INSERT INTO ordenes (cliente_id, precio_total) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."')");
        
        if($insertOrder){
            $orderID = $link->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO orden_items (orden_id, articulo_id, cantidad) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
                $sql .= "UPDATE articulo AS pa INNER JOIN articulo AS pb ON pa.id_Articulo=pb.id_Articulo
                SET pa.existencia = pb.existencia - '".$item['qty']."' WHERE pa.id_Articulo = '".$item['id']."'";
            }
            // insert order items into database
            $insertOrderItems = $link->multi_query($sql);
            
            if($insertOrderItems){
                $userID = $_SESSION['sessCustomerID'];
                $cart->destroy();
                header("Location: ordenRecibida.php?id=$orderID&userID=$userID");
            }else{
                header("Location: carrito.php");
            }
        }else{
            header("Location: carrito.php");
        }
    }else{
        header("Location: carrito.php");
    }
}else{
    header("Location: carrito.php");
}
?>