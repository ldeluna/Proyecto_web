<?php
if(!$_SESSION['usuario']){
  header("Location:autentificacion.php?id=".session_id());
 }

?>
<table class="table table-hover" width="59%" border="1">
  <tr>
    <th colspan="8" scope="col">LISTADO DE SUS FACTURAS</th>
  </tr>
  <tr>
      <td width="12">Número Factura</td>
      <td width="12">Producto</td>
      <td width="12">Nombre Producto</td>
      <td width="12">Cantidad</td>
      <td width="12">Total Factura</td>
  </tr>
  <?php
  
$facturasdetalle = new factura();
    $idfactura = $_POST['facturaid'];
    
  $facturasdetalle->consultarDetalleFacturas($idfactura);
  //foreach ($facturas as $facturax){
      
  for ($i=0;$i<count($facturasdetalle->facturas); $i++){
  
          
          ?>
  <tr>
  <td width="12"><?php echo $facturasdetalle->facturas[$i]['facturaId'] ?></td>
  <td width="12"><?php echo $facturasdetalle->facturas[$i]["productoId"]?></td>
   <td width="12"><?php echo $facturasdetalle->facturas[$i]["nombreproducto"]?></td>
   <td width="12"><?php echo $facturasdetalle->facturas[$i]["cantidad"]?></td>
  <td width="12"><?php echo $facturasdetalle->facturas[$i]["precioVenta"]?></td>
  </tr>
  
  <?php
      
  }
  ?>
    <tr>
        <td colspan="5">

  <form action="facturas.php?id=<?PHP echo session_id()?>"  method="POST" name="actualizo">
  <input type="submit" name="volver" id="verfactura" value="volver" />
  </form>
  </td>
  </tr>
</table>  


