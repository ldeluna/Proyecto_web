<?php

class Cliente {
    
    private $usuario;
    private $nombre;
    private $apellidos;
    private $phone;
    private $phonemovil;
    private $password;
    private $password2;
    private $address;
    private $addresss;
    private $cp;
    private $ciudad;
    private $provincia;
    private $pais;
    private $nif;  
    private $conexion;
    private $email;
    private $edad;
    
   
    public function __construct($usuario,$password,$nombre, $apellidos,$phone,$phonemovil,$address,$addresss,$cp,$ciudad, $provincia,$pais,$nif,$email,$edad)
            //, $password2,$nombre, $apellidos, $email, $edad, $phone,$phonemovil,$address,$addresss,$cp,$ciudad, $provincia,$pais,$nif)
                {
        $this->usuario = $usuario;
       $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->password = $password;
        $this->phone=$phone;
        $this->phonemovil=$phonemovil;
        $this->address=$address;
       //$this->password2= $password2;
        $this->phone = $phone;
        $this->phonemovil  = $phonemovil;
       $this->address  = $address;
        $this->addresss = $addresss;
        $this->cp = $cp;
        $this->ciudad = $ciudad;
        $this->provincia  =$provincia;
        $this->pais = $pais;
        $this->nif = $nif;
        $this->email = $email;
        $this->edad = $edad;
     }
         
      
    public function getUsuario(){
   
       return $this->usuario;   
     }
    
    public function getEmail(){
        return $this->email;
    }
         
    public function getNombre(){
        return $this->nombre;
    }    
 
    public function getApellidos(){
        return $this->apellidos;
    }
    
    public function getEdad(){
        return $this->edad;
    }
    
    public function getPhone(){
        return $this->phone;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getPassword2(){
        return $this->password2;
    }
    
    public function getMovilphone(){
        return $this->movilphone;
    }
    
    public function getDireccion(){
        return $this->direccion;
    }
    
    public function getDireccion2(){
       return $this->direccion2;
    }
    public function getCp(){
       return $this->cp;
    }
   
    public function getCiudad(){
       return $this->ciudad;
    }
     public function getProvincia(){
       return $this->provincia;
    }
    public function getPais(){
       return $this->pais;
    }
    public function getNif(){
        return $this->nif;
    }
   
    public function insertarCliente(){
        
        $conexion = new conexion();
        $conexion->conectar();
        $conexion->iniciartransaccion();
        $sql="INSERT INTO clientes (nombre,apellidos,phone,phonemovil,address,addresss,cp,ciudad,provincia,pais,nif,edad,email) VALUES ('$this->nombre','$this->apellidos','$this->phone','$this->phonemovil','$this->address','$this->addresss','$this->cp','$this->ciudad','$this->provincia','$this->pais','$this->nif','$this->edad','$this->email')";
        $resultado = $conexion->consultar($sql);
        $conexion->errortransaccion($resultado);
        /*$variable ="SELECT MAX(idcliente) AS id FROM clientes";
        //$_SESSION['idcliente'] = $variable ;
        $sql2 = "INSERT INTO usuario (idcliente,usuario,password) VALUES ('$variable','$this->usuario','$this->password')";
        $resultado = $conexion->consultar($sql2);
        $conexion->errortransaccion($resultado);*/
        if($resultado){
         $conexion->commit();
         }
         return $resultado;
       $conexion->cerrarbbdd();
}


   /* public function validar_acceso($usuario=NULL,$password=NULL){
          
      if($usuario !=null and $password!=null)
      {
        $conexion = new conexion();
        $conexion->conectar();
        //$con=mysqli_connect('localhost','root','','proyectoCeac');
        
        $sql = "SELECT * FROM usuario WHERE usuario='htmlspecialchars(trim($usuario),ENT_QUOTES)' AND password='htmlspecialchars(trim($password),ENT_QUOTES)' ";
         $resultado = $conexion->consultar($sql);
        //return $resultado;
       $conexion->cerrarbbdd();
}


//$resultado = mysqli_query($con,$sql);
        //return $resultado;
        //mysqli_close($con);
      
        else 
          
      return false;*/

public function validarUsuario($usuario){
        $validador = new validadorFormularios();
 
        return (
            
            $validador->validarNombreUsuario($usuario->getUsuario()) &
            $validador->validarNombre($usuario->getNombre()) &
            $validador->validarApellidos($usuario->getApellidos()) &
            $validador->validarEmail($usuario->getEmail()) &
            $validador->validarEdad($usuario->getEdad()) &
            $validador->validarTelefono($usuario->getTelefono()) &
            $validador->validarPhoneMovil($usuario->getMovilphone()) &
            $validador->validarDireccion($usuario->getDireccion()) & 
            $validador->validarAdicional($usuario->getDireccion2()) & 
            $validador->validarCP($usuario->getCp()) &
            $validador->validarProvincia($usuario->getProvincia()) &
            $validador->validarCiudad($usuario->getCiudad()) &        
            $validador->validarPassword($usuario->getPassword()) &
            $validador->validarPais($usuario->getPais()) &
            $validador->validarPasswordIguales($usuario->getPassword(), $usuario->getPassword2()) &
            !$this->existeUsuario($usuario->getId())    
        );
    }
    public function updateCliente(){
        $conexion = new conexion();
        $conexion->conectar();
        // $user = $_POST ['usuario'];
        //$conexion=mysqli_connect('localhost','root','','proyectoCeac');
        $conexion->iniciartransaccion();
        $sql = "UPDATE clientes SET nombre='$this->nombre', apellidos = '$this->apellidos', email = '$this->email', edad = '$this->edad', phone = '$this->phone',phonemovil = '$this->phonemovil',address = '$this->address',addresss = '$this->addresss',cp = '$this->cp',ciudad = '$this->ciudad', provincia = '$this->provincia',pais ='$this->pais',nif = '$this->nif' WHERE idcliente = (SELECT idcliente FROM usuario WHERE usuario ='$this->usuario')";
                // where idclient =( SELECT idcliente FROM usuario where usuario='$usuario')";
        $conexion->consultar($sql);
        $resultado = $conexion->consultar($sql);
        $conexion->errortransaccion($resultado);
        //$resultado = mysqli_query($conexion,$sql);
       // $resultado = $conexion->consultar($sql);
        //return $resultado;
        //mysqli_close($con);
       
        $sql2 = "UPDATE usuario SET usuario = '$this->usuario',password = '$this->password' WHERE usuario ='$this->usuario'";
        $resultado = $conexion->consultar($sql2);
        $conexion->errortransaccion($resultado);
        if($resultado){
         $conexion->commit();
         }
         return $resultado;
       $conexion->cerrarbbdd();
    }
}
?>