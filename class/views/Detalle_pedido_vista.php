<?php
if(!$_SESSION['usuario']){
    header("Location:autentificacion.php?id=".session_id());
    }
    //echo 'Su idcliente es '.$_SESSION['idcliente'];
?>
<table class="table table-hover" width="59%" border="1">
  <tr>
    <th colspan="8" scope="col">LISTADO DE SUS PEDIDOS</th>
  </tr>
  <tr>
      <td width="12">Número Pedido</td>
      <td width="12">Producto</td>
      <td width="12">Nombre Producto</td>
      <td width="12">Cantidad</td>
      <td width="12">Precio</td>
  </tr>
  <?php
  //$facturas = new factura();
  //$facturas->consultarFacturas($_SESSION['idcliente']);
  //foreach ($facturas as $facturax){
      
  /*for ($i=0;$i<count($facturas->facturas); $i++){
  
          
          ?>
  <tr>
  <td width="12"><?php echo $facturas->facturas[$i]['facturaId'] ?></td>
  <td width="12"><?php echo $facturas->facturas[$i]["fechaFactura"]?></td>
  <td width="12"><?php echo $facturas->facturas[$i]["totalFactura"]?></td>
  <td width="12"><input type="submit" name="verfactura" id="verfactura" value="verfactura" /></td>
  
  </tr>
    <?php
  
  if(isset($_POST['verfactura']))
  {*/
$pedidodetalle = new pedido();
    $idpedido = $_POST['idpedido'];
    
  $pedidodetalle->consultarDetallePedidos($idpedido);
  //foreach ($facturas as $facturax){
      
  for ($i=0;$i<count($pedidodetalle->pedidos); $i++){
  
          //hay que poner la descripción del producto no el número
          ?>
  <tr>
  <td width="12"><?php echo $pedidodetalle->pedidos[$i]['pedidoid'] ?></td>
  <td width="12"><?php echo $pedidodetalle->pedidos[$i]["productoid"]?></td>
  <td width="12"><?php echo $pedidodetalle->pedidos[$i]["nombreproducto"]?></td>
  <td width="12"><?php echo $pedidodetalle->pedidos[$i]["cantidad"]?></td>
  <td width="12"><?php echo $pedidodetalle->pedidos[$i]["precio"]?></td>
  </tr>
  
  <?php
      
      
  }
  ?>
    <tr>
        <td colspan="5">

  <form action="pedidos_resumen.php?id=<?PHP echo session_id()?>" method="POST" name="actualizo">
  <input type="submit" name="volver" id="verfactura" value="volver" />
  </form>
  </td>
  </tr>
</table> 



