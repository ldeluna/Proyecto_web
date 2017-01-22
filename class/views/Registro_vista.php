<?php


//require_once("class/claseClienteModelo.php");
//require_once("class/claseConexion.php");

if ( isset($_SESSION['username']) && isset($_SESSION['idcliente']) && $_SESSION['username'] != '' && $_SESSION['idcliente'] != '0' ){
	echo '<div class="session_on">
		Ya iniciaste sesi&oacute;n &#124; Ahora haz un <a href="index.php?id=".session_id()">Pedido</a>.<span class="timer" id="timer"  style="margin-left: 10px;"></span>
	</div>';
}
else{
   
$usuario='';
$nombre='';
$apellidos='';
$email='';
$edad='';
$phone='';
$phonemovil='';
$password='';
$password2='';
$address='';
$addresss='';
$cp='';
$ciudad='';
$provincia='';
$pais='';
$nif='';
    
if(isset($_POST['registrar']))
{   
    $nuevoCliente = new Cliente ($_POST['nombre'], $_POST['apellidos'], $_POST['phone'], $_POST['phonemovil'], $_POST['address'], $_POST['address'], $_POST['cp'], $_POST['ciudad'], $_POST['provincia'], $_POST['pais'], $_POST['nif'], $_POST['edad'], $_POST['email']);
    
    $nuevousuario= new Usuario ($_POST['usuario'],$_POST['password']);
    
if($_POST){
    if($_POST['usuario'] == '' && $_POST['password'] == $_POST['password2'] )
      //poner aqui el nuevo cliente e insertar usuario solo si usuario y las dos password son correctas  
	{
		echo 'Por favor llene todos los campos obligatorios (*).';
	}
	else
	{
            $nuevoCliente->insertarCliente();
            $nuevousuario->insertarUsuario();
            echo "registramos el usuario ";
            echo "usuario ="." ".$_POST['usuario'];
            echo "<br />";
            echo "password = "." ".$_POST['password'];
      
}
}

else {
    $_POST['usuario']=$usuario;
    $_POST['nombre']=$nombre;
    $_POST['address']=$$address;
    $_POST['addresss']=$addresss;
    $_POST['apellidos']=$apellidos;
    $_POST['ciudad']=$ciudad;
    $_POST['cp']=$cp;
    $_POST['edad']=$edad;
    $_POST['email']=$email;
    $_POST['nif']=$nif;
    $_POST['pais']=$pais;
    $_POST['password']=$password;
    $_POST['password2']=$password2;
    $_POST['phone']=$phone;
    $_POST['phonemovil']=$phonemovil;
    $_POST['provincia']=$provincia;
}
}
    



?>
<section>
    <div id="allContent">
<div id="alertBoxes"></div>
<div class="container-fluid">
<div class="col-xs-12 col-md-8">
    <div class="row">
        <h2>Formulario de Registro</h2>
          <div id="resultado"></div>
<form action="" method="post" name="registro">
<table class="table table-striped" >
  <div class="col-sm-10"><tr>

          <td><label  class="col-sm-2 control-label">Usuario: <span class="required">*</span></label></td><td><input id="usuarioregistro" class="form-control" name="usuario" size="10" type="text" maxlenght="15" value="" onblur="return validarNombreUsuario(this.value)" autocomplete="off" required></td>
  </tr>
  </div>
    <div class="form-group"><tr>
  <tr>
      <td><label  class="col-sm-2 control-label">Contraseña <span class="required">*</span></label></td><td><input id="password" class="form-control" name="password" type="password"  size="10" maxlength="10" value="<?php echo $password ?>" onblur="return validarPassword(this.value)" autocomplete="off" required></td>
  </tr>
    </div>

  <div class="form-group"><tr>
   <tr>
    <td><label  class="col-sm-2 control-label"> Repita su contraseña: <span class="required">*</span></label></td><td><input id="password2"class="form-control" name="password2" type="password" size="10" maxlength="10" value="<?php echo $password2 ?>" onblur="return validarPasswordIguales(password.value,this.value)" required></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
      <td><label  class="col-sm-2 control-label"> Nombre:</label></td><td><input class="form-control" id="nombre" name="nombre" type="text"  size="15" maxlength="10" value="<?php echo $nombre ?>" onblur="return validarNombre(this.value)" required></td>
  </tr>
    </div>
<div class="form-group"><tr>
  <tr>
      <td><label  class="col-sm-2 control-label"> Email:</label></td><td><input class="form-control" id="email" name="email" type="text"  size="30" maxlength=20" value="<?php echo $email ?>" onblur="return validarEmail(this.value)" required></td>
  </tr>
    </div>
  <div class="form-group"><tr>
  <tr>
      <td><label  class="col-sm-2 control-label"> Apellidos:</label></td><td><input class="form-control" id="apellidos" name="apellidos" type="text"  size="15" maxlength="10" value="<?php echo $apellidos ?>" onblur="return validarApellidos(this.value)"></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
  <td><label  class="col-sm-2 control-label">Dirección:</label></td><td><input class="form-control" id="address" name="address" type="text"  size="15" maxlength="10" value="<?php echo $address ?>" onblur="return validarDireccion(this.value)"></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
  <td><label  class="col-sm-2 control-label">Dirección Complementaria:</label></td><td><input class="form-control" id="addresss" name="addresss" type="text"  size="15" maxlength="10" value="<?php echo $addresss ?>" onblur="return validarAdicional(this.value)"></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label">Código Postal:</label></td><td><input id="cp" class="form-control" name="cp" type="text"  size="5" maxlength="5" value="<?php echo $cp ?>" onblur="return validarCp(this.value)"></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label">Teléfono:</label></td><td><input id="phone" class="form-control" name="phone" type="number"  size="9" maxlength="9" value="<?php echo $phone ?>" onblur="return validarTelefono(this.value)" ></td></td>
  </tr>
    </div>
     <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label">Edad:</label></td><td><input id="edad" class="form-control" name="edad" type="number"  size="9" maxlength="9" value="<?php echo $edad?>" onblur="return validarEdad(this.value)" ></td></td>
  </tr>
    </div>

  <div class="form-group"><tr>
   <tr>
    <td><label  class="col-sm-2 control-label">Teléfono móvil:</label></td><td><input id="phonemovil" class="form-control" name="phonemovil" type="number" size="9" maxlength="9" value=" <?php echo $phonemovil ?>" onblur="return validarPhoneMovil(this.value)"></td>
  </tr>
    </div>
<div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label">Cidudad:</label></td><td><input id="ciudad" class="form-control" name="ciudad" type="text"  size="15" maxlength="15" value="<?php echo $ciudad ?>" onblur="return validarCiudad(this.value)" ></td>
  </tr>
    </div>
    
  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label">Provincia:</label></td><td><input id="provincia" class="form-control" name="provincia" type="text"  size="15" maxlength="15" value="<?php echo $provincia ?>" onblur="return validarProvincia(this.value)"></td></td>
  </tr>
    </div>
  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label">País:</label></td><td><input id="pais" class="form-control" name="pais" type="text" size="15" maxlength="15" value="<?php echo $pais ?>" onblur="return validarPais(this.value)" ></td>
  </tr>
    </div>

  <div class="form-group"><tr>
  <tr>
    <td><label  class="col-sm-2 control-label">DNI</label></td><td><input id="nif" class="form-control" name="nif" type="text"  size="10" maxlength="10" value="<?php echo $nif ?>" onblur="return validarNif(this.value)" required></td>
  </tr>
    </div>

  <div class="col-sm-offset-2 col-sm-10"><tr>
  <tr>
      <td></td>
     
  <td><input  class="btn btn-primary" name="registrar" type="submit" /></td></tr>
    </div>

</table>
</form>

</div>
    </div>
    </div>
</section>
<?php
}
?>
