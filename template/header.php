<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<?php session_start();
//require_once("class/configuracion.php");
require_once ("library/funciones.php");
//require_once ("class/claseConexion.php");

?>
<!--<xml version=1.0 encoding="iso-8859-1" -->

  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	
    <title>Proyecto CEAC</title>
    <link href="template/css/ProyectoCeac.css" rel="stylesheet" media="all" type="text/css"/>
    <!-- Bootstrap -->
    <link href="template/css/bootstrap.min.css" rel="stylesheet" media ="screen"/>
    <link href="template/css/bootstrap.css" rel="stylesheet" media ="screen"/>
	<!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
	
	
	
<!-- Librerí jQuery requerida por los plugins de JavaScript -->
    <!--script src="http://code.jquery.com/jquery.js"></script-->
    <script  type="text/javascript" src="template/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="template/js/functions.ajax.js"></script>

    <script type="text/javascript" src="template/js/funcionesjs.js"></script>
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="template/js/bootstrap.min.js"></script>
    <script src="template/js/bootstrap.js"></script>
   
</head>
    <body>
        <div class ="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <nav class="navbar navbar-default" role="navigation">
  
                <a class="navbar-brand" href="index.php?id=<?PHP echo session_id()?>">PROYECTOWEB</a>
                
 
  
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="login.php?id=<?PHP echo session_id()?>"">Su cuenta</a></li>
     
      <li><a href="registro.php?id=<?PHP echo session_id()?>">Registrarse</a></li>
      <li><a href="carrito.php?id=<?PHP echo session_id()?>">Carrito</a></li>
      <li><a href="pedidos_resumen.php?id=<?PHP echo session_id()?>">Pedidos</a></li>
      <li><a href="facturas.php?id=<?PHP echo session_id()?>">Consultar sus factura</a></li>
      <li><a href="actualizarsusdatos.php?id=<?PHP echo session_id()?>">Actualizar datos</a></li>
      <li><a href="salir.php?id=<?PHP echo session_id()?>">Salir</a></li>
    
      </li>
    </ul>
 
   
  </div>
</nav>
      
        </div>
    </div>