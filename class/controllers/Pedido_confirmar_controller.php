<?php
require_once("template/header.php");
require_once('class/models/Pedido_confirmar_modelo.php');

$carro=$_SESSION['carrito'];
$factura = new factura();
$pedido = new pedido();
$factura->guardarFactura($_SESSION['idcliente'], $_SESSION['total']);

$pedido->guardarPedido($_SESSION['idcliente']);
foreach($carro as $articulo){
         
      
      $id=$articulo['id'];
      $producto =$articulo['nombre'];
      $precio = $articulo['precio'];
      $cantidad = $articulo['cantidad'];
      $subtotal= $articulo['precio']*$articulo['cantidad'];
               
      
      
      $factura->guardarDetalleFactura($id,$producto,$precio,$cantidad);
      $pedido->guardarDetallePedido($id,$producto,$precio,$cantidad);
}
require_once('class/views/Pedido_confirmar_vista.php');


      $_SESSION['carrito']=NULL;
      
require_once("template/footer.php");
?>

