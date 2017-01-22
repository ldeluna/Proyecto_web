<?php
if (isset($_SESSION['usuario'])){
echo 'Bienvenido Sr/Sra '.$_SESSION['usuario'];

}
?>
<div class="row">
  <div class="col-xs-12 col-md-8">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <img src="img/bodega.jpg" alt="bodega1">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <img src="img/bodega2.jpg" alt="bodega2">
      <div class="carousel-caption">
        
      </div>
    </div>
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>
</div>

<section>
<div class="row">
  <div class="col-xs-12 col-md-8">
      <form action='index.php?id=<?PHP echo session_id();?>' method='get'>
<table class="table table-hover">
    <caption>Listado de Artículos : <?php echo count ($nuevoproducto->articulos);?></caption>
  <tr> 
    
  </tr>
  <table class="table table-hover" width="100%" border="1">
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">BUSCAR</th>
    <th scope="col">
  <form id="form2" name="form2" method="post" action="">
      <label for="buscar"></label>
      <input type="text" name="buscar" id="buscar" value="" />
    </form></th>
    <th scope="col">
    <form id="form3" name="form3" method="post" action="">
      <input type="submit" name="aceptar" id="aceptar" value="aceptar" />
    </form></th>
  </tr>
  <tr>
    
  </tr>
  <tr>
    <td bgcolor="#B6B6B6">id</td>
    <td bgcolor="#B6B6B6">imagen</td>
    <td bgcolor="#B6B6B6">nombre</td>
    <td bgcolor="#B6B6B6">descripcion</td>
    <td bgcolor="#B6B6B6">precio</td>
    <td bgcolor="#B6B6B6">en stock</td>
    <td bgcolor="#B6B6B6">fecha</td>
    <td bgcolor="#B6B6B6">agregar</td>
  </tr>
  

<tr>
    <?php
    //hay que ver el buscador....
        //while ($nuevoproducto->articulos){
         for ($i=0;$i<count($nuevoproducto->articulos);$i++) {
         ?>
  
    <td><?php echo $nuevoproducto->articulos[$i]['productoId'];?></td>
    <td><img src="<?php echo  $nuevoproducto->articulos[$i]['imagenProducto']; ?>" width="100" height="100"</td>
    <td><?php echo $nuevoproducto->articulos[$i]['nombreProducto']; ?></td>
    <td><?php echo $nuevoproducto->articulos[$i]['descripcion']; ?></td>
    <td><?php echo $nuevoproducto->articulos[$i]['precioVenta']; ?></td>
    <td><?php echo $nuevoproducto->articulos[$i]['stock']; ?></td>
         <td><?php echo $nuevoproducto->articulos[$i]['fecha']; ?></td>
         <td><form action="carrito.php?id=<?PHP echo session_id()?>" method="post" name="compra">
            <input name="id_txt" type="hidden" value="<?php echo $nuevoproducto->articulos[$i]['productoId']; ?>"/>
            <input name="nombreProducto" type="hidden" value="<?php echo $nuevoproducto->articulos[$i]['nombreProducto'];?>"/>
            <input name="precioVenta" type="hidden" value="<?php echo $nuevoproducto->articulos[$i]['precioVenta']; ?>"/>
            <input name="cantidad" type="hidden" value="1"/> 
            <?php $_SESSION['id_txt'] = $nuevoproducto->articulos[$i]['productoId'];
                  $_SESSION['nombreProducto']=$nuevoproducto->articulos[$i]['nombreProducto'];
                  $_SESSION['precioVenta']=$nuevoproducto->articulos[$i]['precioVenta'];
                  $_SESSION['cantidad']=1;
            ?>
            <input name="Comprar" type="submit" value="Comprar"/>
        </form></td>
  </tr>
    
        <?php }?>
  

         </table><?php ?>
 <p><a href="carrito.php?id=<?PHP echo session_id()?>">ver carrito</a></p>

