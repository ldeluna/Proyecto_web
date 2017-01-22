<?php

if(isset($_SESSION['username'])){
  $facturas = new factura();
  $facturas->consultarFacturas($_SESSION['idcliente']);
    

?>

<table class="table table-hover" width="59%" border="1">
  <tr>
    <th colspan="8" scope="col">LISTADO DE SUS FACTURAS</th>
  </tr>
  <tr>
      <td width="12">Número Factura</td>
      <td width="12">Fecha Factura</td>
      <td width="12">Total Factura</td>
      <td width="12">ver</td>
  </tr>
  <?php
  
  
      
  for ($i=0;$i<count($facturas->facturas); $i++){
  
          
          ?>
  <tr id="<?php echo 'invoice'.$facturas->facturas[$i]['facturaId'] ?>">
  <td  width="12"><?php echo $facturas->facturas[$i]['facturaId'] ?></td>
  
  <td width="12"><?php echo $facturas->facturas[$i]["fechaFactura"]?></td>
  <td width="12"><?php echo $facturas->facturas[$i]["totalFactura"]?></td>
  <td>
      
    
  <form action="detallefacturas.php?id=<?PHP echo session_id()?>" " method="POST" name="actualizo">
      <input type='submit' name="verfactura" class="verfactura" value="verfactura" />
  <input type="hidden" name="facturaid" id="facturaid" value ="<?php echo $facturas->facturas[$i]['facturaId'] ?>" />
  
  </form>
  </td>
  </tr>

  
 
  <?php
  }
  ?>
  
</table>
 <?php
}
else
{
echo '<div >
		No iniciaste sesión. <a href="login.php?id=<?PHP echo session_id()?>">Inicia sesión</a>
	</div>';

}


