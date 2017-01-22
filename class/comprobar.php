<?php
session_start();
require_once("db/claseConexion.php");
    
    if(isset($_POST['usuario'])){
        $user=$_POST['usuario'];
        //echo $user;
       
      if(!empty($user)) {
           // comprobar($user);
             $conexion =new conexion();
		$conexion->conectar();
		 $sql =("SELECT * FROM usuario WHERE usuario = '".$user."'");
		$resultado = $conexion->consultar($sql);
                //echo $resultado;
                if($resultado){
                    if ( mysqli_num_rows($resultado) == 1 ){
                         echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>";
                    }
                    else {
                        echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
                    }
                }
             else {
                 
                 echo 'Existe un error';
             }
    }
    
 else {
    
    echo 'hay alg�n error';
    
 }
    }
    
?>