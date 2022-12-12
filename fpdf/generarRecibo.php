<?php
    include ('../includes/config/db.php');

    /* incluimos primeramente el archivo que contiene la clase fpdf */

    include ('fpdf/fpdf.php');

    /* tenemos que generar una instancia de la clase */

    $pdf = new fpdf();

    $pdf->AddPage();

    /* seleccionamos el tipo, estilo y tamaño de la letra a utilizar */

    $pdf->SetFont('Helvetica', 'B', 12);

    $pdf->Image('../img/logo.png', 9.8, 4, 30, 17, 'png', 'http://end.monkeydevs.mx/');

    $pdf->SetXY(8.9, 22);

    $pdf->Write (0, "END, S.A. de C.V.","https://end.monkeydevs.mx/");

    $pdf->SetXY(8.9, 27);

    $pdf->SetFont('Helvetica', '', 10);

    $pdf->Write (0, utf8_decode("Blvd. Miguel Alemán #625 Local 2"),"https://end.monkeydevs.mx/");

    $pdf->SetXY(8.9, 32);

    $pdf->Write (0, utf8_decode("Col. El Campestre, Gómez Palacio. C.P. 35080"),"https://end.monkeydevs.mx/");

    $pdf->SetXY(8.9, 46);

    $pdf->SetFont('Helvetica', 'B', 12);

    if(!empty($_GET['userID'])){
        $query = $link->query("SELECT * FROM cliente WHERE id_Cliente = ".$_GET['userID']);

        while($row = $query->fetch_assoc()) {
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $calle = $row['calle'];
            $email = $row['email'];
            $telefono = $row['telefono'];
            $ciudad = $row['ciudad'];
            $estado = $row['estado'];
            $cp = $row['cp'];

    $pdf->Write (0, utf8_decode("Información del cliente"));

    $pdf->Ln();

    $pdf->SetXY(8.9, 50.7);

    $pdf->SetFont('Helvetica', '', 10);

    $pdf->Write(0, utf8_decode($nombre." ".$apellido)); 

    $pdf->Ln(); //salto de linea

    $pdf->SetXY(8.9, 55);

    $pdf->Write(0, utf8_decode($calle)); 

    $pdf->SetXY(8.9, 59.5);

    $pdf->Write(0, utf8_decode($ciudad.", ".$estado));

    $pdf->SetXY(8.9, 64);

    $pdf->Write(0, $email);

    $pdf->SetXY(8.9, 69.5);

    $pdf->Write(0, $telefono); 

    //$pdf->Ln(15);//ahora salta 15 lineas

    $pdf->SetXY(8.9, 82);

    $pdf->SetFont('Helvetica', 'B', 12);

    $pdf->Write(0, utf8_decode("Información de la compra")); 

    $pdf->SetFont('Helvetica', '', 10);

    $pdf->Ln(4);

    //$pdf->SetTextColor('255','0','0');//para imprimir en rojo

    if(!empty($_GET['userID'])){
        $query = $link->query("SELECT * FROM ordenes WHERE id = ".$_GET['id']);
        $pdf->SetTitle("Recibo orden #".$_GET['id']." | END.");

        while($row = $query->fetch_assoc()) {
            $total = $row['precio_total'];

                $query = $link->query("SELECT COUNT(articulo_id) FROM orden_items WHERE orden_id = ".$_GET['id']);

                while($row = $query->fetch_assoc()) {
                    $count = $row['COUNT(articulo_id)'];

    $pdf->Multicell(190, 6, utf8_decode(
        "ID de orden: #".$_GET['id'].
        "\nNúmero de artículos en la orden: $count
        Total: MX$".$total
    ), 1, 'R');

}

    $qr = $link->query("SELECT * FROM orden_items WHERE orden_id = ".$_GET['id']);
    
    while($row = $qr->fetch_assoc()) {
        $items = $row['articulo_id'];

        $qr2 = $link->query("SELECT * FROM articulo WHERE id_Articulo = ".$items);
        while($row = $qr2->fetch_assoc()) {
            $idP = $row['id_Articulo'];
            $nombre = $row['nombre'];
            $precio = $row['precio'];
            $marca = $row['marca'];

            $qr3 = $link->query("SELECT COUNT(*) FROM articulo WHERE id_Articulo = ".$idP);
            while($row = $qr3->fetch_assoc()) {
                $cnt = $row['COUNT(*)'];
            }

            //$pdf->SetWidths(160,30);

            $pdf->Multicell(190, 6.3, 
                utf8_decode(
                    "Artículo: ".str_replace("`", "'", $nombre).
                    "\nPrecio: MX$".$precio.
                    "\nMarca: ".$marca.
                    "\nCantidad: ".$cnt
                ), 1, 'L'
            );
        }
    }

    $pdf->SetFont('Helvetica', 'B', 12);

    $pdf->Multicell(190, 25, utf8_decode("We believe in empowering individuality."), 2, 'C');

    $pdf->Line(0,290,700,290); //impresión de linea

    $pdf->Output("../recibos/recibo_". $_GET['id'] .".pdf",'F');

    echo "<script language='javascript'>window.open('../recibos/recibo_".$_GET['id'].".pdf', '_self');</script>";//paral archivo pdf generado
        
    }
        }}}
    exit;
?>