<?php

if ( isset($_SESSION['username']) && isset($_SESSION['idcliente']) && $_SESSION['username'] != '' && $_SESSION['idcliente'] != '0' ){
	echo '<div class="session_on">
		Ya iniciaste sesi&oacute;n &#124; Ahora has un <a href="javascript:void(0);" id="sessionKiller">logout</a>.<span class="timer" id="timer"  style="margin-left: 10px;"></span>
	</div>';
}
else 
{

?>
<section>
<div id="allContent">
<div id="alertBoxes"></div>
		<span class="loginBlock"><span class="inner">
<div class="row">
  <div id ="formulario_login" class="col-xs-12 col-md-8">
      <h1>Formulario de Acceso</h1>
<form class="form-inline" action="" method="post" >
<div id="autentificar" align="center">
<table class="table table-hover">
  <div class="form-group"><tr>
          <th><label>Usuario</label></th>
    <th><label>Contraseña</label></th>
    <th></th>
  </tr>
  <br/>
  <tr>
    <td><input id="login_username" name="login_username" type="text"  value="" size="20" maxlength="30" required/></td>
    <td><input id="login_userpass" name="login_userpass" type="password"  size="10" maxlength="15" required/></td>
    <td><input id="login_userbttn" class="btn btn-primary"   type="submit" name="enviar"  value="Entrar" /></td>
   </tr>
   <tr>
       <td></td>
       <td></td>
       <td><a href="registro.php?id=<?PHP echo session_id()?>">Registrarse</a></td>
   </tr>
  </form>
</table>
</div>
 </form>
</div>
  </div>
  </div>
  </span></span>
</section>

<?php
}
?>


