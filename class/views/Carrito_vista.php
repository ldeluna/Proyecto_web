<?php



$IP= $_SERVER['REMOTE_ADDR'];
//$carrito = new Carrito(); lo quito de aquí.
//conectar con usuario para poner sus datos
//carrito terminado

//cuando entras al carrito siempre aparece el ultimo item del formulario anterior.
if(isset($_SESSION['username'])){
/*if(!$_SESSION['usuario']){
    header("Location:autentificacion.php?id=".session_id());
    }*/
    
    $carrito = new Carrito();
    

      if(isset($_POST['id_txt'])){   
        $id=$_POST['id_txt'];
        $nombre=$_POST['nombreProducto'];
        $precio=$_POST['precioVenta'];
        $cantidad=$_POST['cantidad'];
    
        $articulo=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cantidad);//creo el array donde capturo todo lo que viene del post 
        $carrito->add($articulo);
    }
   
if(isset($_POST['id2'])){//el carrito se actualiza en la cantidad indicada
    $id= $_POST['id2'];
    $unique_id=md5($id);
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $cuanto=$_POST['cantidad2'];
    $carrito->remove_producto($unique_id);
    $articulo=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cuanto);//creo el array donde capturo todo lo que viene del post
    $carrito->add($articulo);
    //$carrito->update_carrito();
}


 if(isset($_POST['id3'])){
        $unique_id = $_POST['id3'];
        $carrito->remove_producto($unique_id);
        $carrito->update_carrito();
        $carrito->get_content();
 }
 



$carro = $carrito->get_content();


if($carro){
    
    echo "Su carrito contiene: ". count($carro)." articulo";}
        else  {
            echo "Su carrito contiene: ". $carrito->articulos_total(). " artículos";
        }
        $total_articulos=count($carro);
    if($total_articulos==0) {
        $carrito->destroy();
    header("Location:index.php?id=".session_id());
}      
       
      ?> 
    <table class="table table-hover" width="59%" border="1">
  <tr>
    <th colspan="8" scope="col">LISTADO DE SUS COMPRAS</th>
  </tr>
  <tr>
      <td width="12">ID</td>
      <td widht="12">CODIGO ARTICULO</td>
    <td width="46%">PRODUCTO</td>
    <td width="13%">PRECIO</td>
    <td width="13%">CANTIDAD</td>
    <td colspan="3" align="center">SUBTOTAL</td>
    
  </tr><?php
  
/*if($carro = null){
    echo "su carrito esta vacío";
    header("Location:index.php?id=".session_id()); 
    
}

else{ */
    $total=0;

	foreach($carro as $articulo){
            
        
?>
       <tr>
            <td> <?php echo $articulo["id"];?>
		  
            <td><?php echo $articulo["unique_id"];?></td>
          
            <td> <?php echo $articulo["nombre"];?></td>
         
            
            <td><?php echo $articulo["precio"];?></td>
	    
            <td>
                 <form action="" method="POST" name="actualizo">
                     
        <input name="cantidad2" type="text" value="<?php echo $articulo['cantidad'] ?>" size="3" maxlength="3" />
        <input name="id2" type="hidden" value="<?php echo $articulo["id"]?>" />
        <input name="nombre" type="hidden" value="<?php echo $articulo["nombre"]?>" />
        <input name="precio" type="hidden" value="<?php echo $articulo["precio"]?>" />
                 </td>
                 <td>
                     <input name="" type="image" src="img/iconos/actualizar.jpg" width="25" height="25" /></td>
    </form>
       
		<?php 
                $subtotal=$articulo["precio"]*$articulo["cantidad"];
                $total = $total + $subtotal;
                
                 ?>
                 <td width="13%" align="center"><?php echo $subtotal ?></td>
                     <td>
                         <form action="" method="post">
                     <input name="id3" type="hidden" value="<?php echo $articulo["unique_id"] ?>" />
                    <input type="image" src="img/iconos/images.jpg"  width="25" height="25"/>
                    </form>
       </tr>
       <tr><?php }?>
           <td colspan="8" scope="col">  <?php echo "Total Carrito: ". $total; ?> </td>
           
        
  </tr>
  
    </table>
<table class="table table-hover" width="59%" border="1">
<tr>
    <td colspan="4" scope="col">
<p><a href="index.php">
        <input type="submit" name="volver" id="seguircomprando" value="Seguir comprando" /></a></p>	</td>
<td colspan="4" scope="col" align="right">
    <form id="form1" name="form1" method="post" action="carrito_confirmar.php?id=<?PHP echo session_id()?>">
       <?php   if(isset($carro)){
      $_SESSION['carrito']=$carro;
         }?>
      <input type="submit" name="confirmarPedido" id="confirmarPedido" value="Confimar Pedido" />
    </form></td>
</tr>
</table>
           <?php
           

?>
<?php
}
else
{
echo '<div >
		No iniciaste sesión. <a href="login.php?id=<?PHP echo session_id()?>">Inicia sesión</a>
	</div>';

}
?>


