<?php
	session_start();
        require_once("db/claseConexion.php");
	require_once("claseUsuario.php");
	if(isset ($_POST['usuario']) and isset($_POST['password'])){
    
      $nuevocliente = new usuario($_POST['usuario'],$_POST['password']);
      
      $nuevocliente->validar_acceso($_POST['usuario'],$_POST['password']);
         $_SESSION['usuario']=$_POST['usuario']; 
         $_SESSION['password']=$_POST['password']; 
	}
?>