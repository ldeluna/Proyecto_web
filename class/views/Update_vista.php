<?php
if(isset($_SESSION['username'])){
   
    $user = new usuario($_SESSION['usuario'],$_SESSION['password']);
    $user->consultarUsuario($_SESSION['usuario']);
    $customer = new usuario($_SESSION['usuario'],$_SESSION['password']);
    $customer->consultarCliente($_SESSION['usuario']);
  
    if(isset($_POST['actualizar'])){
            

        $user->usuario  = $_POST['usuario'];
         $user->password =  $_POST['password'];
          $customer->nombre= $_POST['nombre'] ;
          $customer->apellidos= $_POST['apellidos'];
         $customer->email = $_POST['email']  ;
           $customer->phone=$_POST['phone'] ;
           $customer->phonemovil=$_POST['phonemovil'];
          $customer->address= $_POST['address'];
           $customer->addresss=$_POST['addresss'];
           $customer->cp= $_POST['cp'];
           $customer->ciudad = $_POST['ciudad'];
           $customer->provincia=$_POST['provincia'];
           $customer->pais=$_POST['pais'];
           $customer->nif=$_POST['nif'];
           $customer->edad=$_POST['edad'];
           
           $cliente = new cliente($_POST['usuario'], $user->password, $customer->nombre,$customer->apellidos,$customer->phone,$customer->phonemovil,$customer->address,$customer->addresss,$customer->cp,$customer->ciudad, $customer->provincia,$customer->pais,$customer->nif, $customer->email,$customer->edad);
           $cliente->updateCliente();
           
           
    } 
         
?>
<div class="container-fluid">
<div class="col-xs-12 col-md-8">
    <div class="row">
<form action="" method="post" name="actualizar">
<table class="table table-striped" >
  <div class="col-sm-10"><tr>
          <th></th>
         
          <th>Sus datos</th>
          <th></th>
          
      </tr>
      <tr><div class="form-group">
          
          <td><label  class="col-sm-2 control-label">USUARIO:</label></td><td><input  value="<?php echo $user->usuario ?>" class="form-control" name="usuario" type="text" value="" size="15" maxlength="10" /></td>
  </tr>
      
      <tr><div class="form-group">
          
          <td><label  class="col-sm-2 control-label">EMAIL:</label></td><td><input  value="<?php echo $customer->email ?>" class="form-control" name="email" type="text" value="" size="10" maxlength="30" /></td>
  </tr>
  </div>
    <div class="form-group"><tr>
  <tr>
      <td><label  class="col-sm-2 control-label"> PASSWORD:</label></td><td><input value="<?php echo $user->password ?>" class="form-control" name="password" type="text" value="" size="10" maxlength="10" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
   <tr>
    <td><label  class="col-sm-2 control-label"> CONFIRMAR PASSWORD:</label></td><td><input value="<?php echo $user->password ?>" class="form-control" name="Confirmpassword" type="" value="" size="10" maxlength="10" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
      <td><label  class="col-sm-2 control-label"> NOMBRE:</label></td><td><input value="<?php echo $customer->nombre ?>" class="form-control" name="nombre" type="text" value="" size="15" maxlength="10" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
      <td><label  class="col-sm-2 control-label"> APELLIDOS:</label></td><td><input value="<?php echo $customer->apellidos ?>" class="form-control" name="apellidos" type="text" value="" size="15" maxlength="10" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
  <td><label  class="col-sm-2 control-label">DIRECCION:</label></td><td><input value="<?php echo $customer->address ?>" class="form-control" name="address" type="text" value="" size="15" maxlength="10" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label">DIRECCION 2:</label></td><td><input value="<?php echo $customer->addresss ?>" class="form-control"  name="addresss" type="text" value="" size="15" maxlength="10" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label"> CÓDIGO POSTAL:</label></td><td><input value="<?php echo $customer->cp ?>" class="form-control" name="cp" type="text" value="" size="5" maxlength="5" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label"> TELÉFONO:</label></td><td><input value="<?php echo $customer->phone ?>"class="form-control" name="phone" type="text" value="" size="9" maxlength="9" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
   <tr>
    <td><label  class="col-sm-2 control-label"> TELÉFONO MÓVIL:</label></td><td><input value="<?php echo $customer->phonemovil ?>" class="form-control" name="phonemovil" type="text" value="" size="9" maxlength="9" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label"> PROVINCIA:</label></td><td><input value="<?php echo $customer->provincia ?>" class="form-control" name="provincia" type="text" value="" size="15" maxlength="15" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label"> POBLACION:</label></td><td><input value="<?php echo $customer->ciudad ?>"  class="form-control" name="ciudad" type="text" value="" size="15" maxlength="15" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label"> PAIS:</label></td><td><input value="<?php echo $customer->pais ?>"  class="form-control" name="pais" type="text" value="" size="15" maxlength="15" /></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label"> NIF/CIF/DNI</label></td><td><input value="<?php echo $customer->nif ?>"  class="form-control" name="nif" type="text" value="" size="10" maxlength="10" /></td></td>
  </tr>
    </div>
      <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label"> Edad</label></td><td><input value="<?php echo $customer->edad ?>"  class="form-control" name="edad" type="text" value="" size="10" maxlength="10" /></td></td>
  </tr>
    </div>

  <div class="col-sm-offset-2 col-sm-10"><tr>
  <tr>
     <td></td>
     <td></td>
     <td></td>
  <td><input align="right" class="btn btn-primary" name="actualizar" type="submit" value="Actualizar" /></td></tr>
    </div>

</table>
</form>

</div>
    </div>
    </div>
<div id="footer">
<?php

}
else
{
echo '<div >
		No iniciaste sesión. <a href="login.php?id=<?PHP echo session_id()?>">Inicia sesión</a>
	</div>';

}

