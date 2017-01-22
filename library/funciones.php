<?php

function validarNombreUsuario ($usuario){
        echo '<script> validarNombreUsuario("'.$usuario.'") </script>';      
        return (preg_match('/^[a-zA-Z0-9_-]{4,15}$/', $usuario));
    }
    
function validarEmail ($email){
        echo '<script> validarEmail("'.$email.'") </script>';
        return (preg_match('/^[a-zA-Z]+([\.]?[a-zA-Z0-9_-]+)*@[a-z0-9]+([\.-]+[a-z0-9]+)*\.[a-z]{2,4}$/', $email));
    }
    
function validarNombre ($nombre){
        echo '<script> validarNombre("'.$nombre.'") </script>';
        return (($nombre=="")||(preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $nombre)));      
    }
    
function validarApellidos ($apellidos){
        echo '<script> validarApellidos("'.$apellidos.'") </script>';
        return (($apellidos=="")||(preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $apellidos))); 
    }
    
function validarEdad ($edad){
        echo '<script> validarEdad("'.$edad.'") </script>';
        return ((preg_match('/^[0-9]{1,3}$/', $edad))&&($edad<100)&&($edad>5));        
    }
    
function validarTelefono ($phone){
        echo '<script> validarTelefono("'.$phone.'") </script>';
        return (($phone)||(preg_match('/^[0-9]{9}$/', $phone))); 
    }
function validarPhoneMovil ($phonemovil){
        echo '<script> validarPhoneMovil("'.$phonemovil.'") </script>';
        return (($phonemovil)||(preg_match('/^[0-9]{9}$/', $phonemovil))); 
    }  
function validarPassword ($password){
        echo '<script> validarPassword("'.$password.'") </script>';
        return (strlen($password)>=4);
    }
    
function validarPasswordIguales ($password, $password2){
        echo '<script> validarPasswordIguales("'.$password.'","'.$password2.'") </script>';
        return ($password == $password2);
    }
function validarDireccion ($address){
        echo '<script> validarDireccion("'.$address.'") </script>';
        return (($address=="")||(preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $address))); 
}
function validarAdicional ($addresss){
        echo '<script> validarAdicional("'.$addresss.'") </script>';
        return (($addresss=="")||(preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $addresss))); 
}
function validarCP ($cp){
        echo '<script> validarCP("'.$cp.'") </script>';
        return ((preg_match('/^[0-9]{1,3}$/', $cp))&&($cp<=5)&&($$cp>=1));
}
function validarProvincia ($provincia){
        echo '<script> validarProvincia("'.$provincia.'") </script>';
        return (($provincia=="")||(preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $provincia)));      
    }
function validarCiudad($ciudad){
        echo '<script> validarCiudad("'.$ciudad.'") </script>';
        return (($ciudad=="")||(preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $ciudad)));      
    }
function validarPais($pais){
        echo '<script> validarPais("'.$pais.'") </script>';
        return (($pais=="")||(preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $pais)));      
    }
    function validarNif($nif){
        echo '<script> validarNif("'.$nif.'") </script>';
        $expresion_regular_nif = '/^\d{8}[a-zA-Z]$/';
 
  if($expresion_regular_nif.test ($nif) == true){
     $numero = nif.substr(0,nif.length-1);
     $let = nif.substr(nif.length-1,1);
     $numero = numero % 23;
     $letra='TRWAGMYFPDXBNJZSQVHLCKET';
     $letra=$letra.substring($numero,$numero+1);
    if ($letra!=$let.toUpperCase()) {
       echo('Dni erroneo, la letra del NIF no se corresponde');
     }else{
       echo('Dni correcto');
     }
  }else{
     echo('Dni erroneo, formato no válido');
   }
        
        
        
        return (($nif=="")||(preg_match('/^\d{8}[a-zA-Z]$/', $nif)));      
    }
	/*function conectar($conectando){
		$conectando=mysql_connect(SERVER,USER,PW);
		mysql_select_db(BBDD,$conectando) or die (mysql_error());
		}
	function consulta($sql) {
		$sql1=conectar(SERVER,USER,PW);
                $resultado = mysql_query($sql,$sql1);
       if (!$resultado){
       echo 'Mysql error: '. mysql_error();
       exit;
       }
        return $resultado;}*/
	
?>