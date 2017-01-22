<?php 

if(isset($_SESSION['username'])){

   if(!$_SESSION['carrito']){
    header("Location:index.php?id=".session_id());
    } 
   
$conexion = new conexion();
$conexion->conectar();

$sql2="SELECT MAX(facturaid) AS id FROM factura";
$facturaid = $conexion->consultar($sql2);
         if ($row = mysqli_fetch_row($facturaid)) 
           {
         $facid = trim($row[0]);
         $facid_num = $facid+1;
             }
echo ' Factura de su pedido nº '. $facid_num ; 
    $customer= new usuario($_SESSION['usuario'],$_SESSION['password']);
    $customer->consultarCliente($_SESSION['usuario']);
    $_SESSION['idcliente']=$customer->idcliente;
    
    ?>
<table class="table table-hover" width="40%" border="1">
    <tr>
    <th colspan="2" scope="col">DATOS DEL COMPRADOR </th>
  </tr>
  <tr>
      <TD>Nombre del Comprador</td><td width="80%"><?php echo $customer->nombre ;?> </td>
    </tr>
     <tr>
    <TD>Email del comprador</td><td width="80%"><?php echo $customer->email ;?> </td>
    </tr>
    <tr>
   <TD>Telefono  del Comprador: </td> <td width="80%"><?php echo $customer->phone ;?> </td>
   </tr>
    <TD>Dirección de envio: </td><td width="80%"><?php echo $customer->address .'   '. $customer->addresss ;?> </td>
    <tr>
   <TD>Pais</td> <td width="80"> <?php echo  $customer->pais; ?></td>
   </tr>
</TABLE>
<table class="table table-hover" width="59%" border="1">
  <tr>
    <th colspan="5" scope="col">Este es su pedido: </th>
  </tr>
  <tr>
     <td width="12%">id</td>
    <td width="46%">PRODUCTO</td>
    <td width="13%">PRECIO</td>
    <td width="13%">CANTIDAD</td>
    <td colspan="2" align="center">SUBTOTAL</td>
  </tr>
      <?php
  
  $carro=$_SESSION['carrito'];
  $total = 0;
  if(isset($carro)){
      
     foreach($carro as $articulo){
       
          ?>
  <tr>
        <td><?php echo $articulo['id'] ?></td>
        <td><?php echo $articulo['nombre'] ?></td>
        <td align="center"><?php echo $articulo['precio'] ?></td>
        <td align="center"><?php echo $articulo['cantidad'] ?></td>
        <?php 
               $subtotal=$articulo['precio']*$articulo['cantidad'];
               $total = $total + $subtotal;
                ?>
        <td align="center"><?php echo $subtotal ?></td>
       
  </tr>
     <?php
          }
        ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>TOTAL</td>
    <td colspan="3" align="center"><?php echo $total; ?></td>
    <?php $_SESSION['total']  =$total;?>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <td colspan="5" align="right"><form action="pedido_confirmar.php?id=<?PHP echo session_id()?>" method="post" name="compra">
            
            <input name="ConfimarPedido" type="submit" value="Finalizar Compra"/>
        </form></td>
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

?>

