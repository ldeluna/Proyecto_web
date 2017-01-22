<?php
if(isset($_SESSION['username'])){
    
?>
<table class="table table-hover" width="59%" border="1">
  <tr>
    <th colspan="8" scope="col">LISTADO DE SUS PEDIDOS</th>
  </tr>
  <tr>
      <td width="12">Número Pedido</td>
      <td width="12">Fecha Pedido</td>
      <td width="12">Situación Pedido</td>
      <td width="12">ver</td>
  </tr>
  <?php
  $pedidos = new pedido();
  $pedidos->consultarPedidos($_SESSION['idcliente']);
 
      
  for ($i=0;$i<count($pedidos->pedidos); $i++){
  
          
          ?>
  <tr>
  <td width="12"><?php echo $pedidos->pedidos[$i]['idpedido'] ?></td>
  <td width="12"><?php echo $pedidos->pedidos[$i]["fechapedido"]?></td>
  <td width="12"><?php echo $pedidos->pedidos[$i]["situacionpedido"]?></td>
  <td>
  <form action="detallepedido.php?id=<?PHP echo session_id()?>" method="POST" name="actualizo">
  <input type="submit" name="verpedido" id="verfactura" value="Ver pedido" />
  <input type="hidden" name="idpedido" id="idpedido" value ="<?php echo $pedidos->pedidos[$i]['idpedido'] ?>" />
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
		No iniciaste sesión. <a href="login.php?id=<?PHP echo session_id()?>" >Inicia sesión</a>
	</div>';

}
 require_once("template/footer.php");
?>

