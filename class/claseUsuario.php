<?php
class Usuario {
        public $idcliente;
	public $usuario;
	public $password;
        public $email;    
        public $nombre;
        public $apellidos;
        public $filas;
        public $phone;
        public $phonemovil;
        public $address;
        public $addresss;
        public $cp;
        public $ciudad;
        public $provincia;
        public $pais;
        public $nif;
        public $edad;
	
  public function __construct($usuario,$password)
       {
      
      $this->usuario = $usuario;
      $this->password = $password ;
     
     
       } 
       
public function validar_acceso($usuario,$password){
          
      if($usuario!=NULL and $password!=NULL)
      {
         
        $conexion = new conexion();        
        $conexion->conectar();
        $this->usuario = htmlspecialchars(trim($usuario,ENT_QUOTES));
        $this->password = htmlspecialchars(trim($password,ENT_QUOTES));
		//$sql = 'SELECT user,passwd,id FROM ajaxusers WHERE user="' . $_POST['login_username']. '" && passwd="' . md5($_POST['login_userpass']) . '" LIMIT 1';
        $sql = "SELECT * FROM usuario WHERE (usuario='$this->usuario' AND  password='$this->password') ";
        
        $resultado = $conexion->consultar($sql);
		if($resultado){
		if ( mysqli_num_rows($resultado) == 1 ){
						
						$user = mysqli_fetch_array($resultado);
						
						$_SESSION['username']	= $user['usuario'];
						$_SESSION['idcliente']	= $user['idcliente'];
						echo 1;
						
					}
					else
						echo 0;
					$conexion->cerrarbbdd();
				}
				else
					echo 0;
		}
	  }
public function consultarUsuario($usuario){
    $conexion = new conexion();        
        $conexion->conectar();
        $this->usuario = htmlspecialchars(trim($this->usuario,ENT_QUOTES));
         $sql="SELECT * FROM usuario WHERE usuario='$this->usuario'"; 
    
  
    $consulta =$conexion->consultar($sql);     
        
   while ($this->filas = mysqli_fetch_array($consulta)){  
    $this->password = $this->filas ['password'];
    $this->usuario = $this->filas['usuario'];
  
       }
       $conexion->cerrarbbdd();
}
    
   public function consultarCliente($usuario){ 
        $conexion = new conexion();        
        $conexion->conectar();
        $this->usuario = htmlspecialchars(trim($this->usuario,ENT_QUOTES));
        $sql=" SELECT * FROM clientes WHERE idcliente=(SELECT idcliente FROM usuario WHERE usuario ='$this->usuario')";
        $consulta =$conexion->consultar($sql);
        if($consulta){
        
            while ($this->filas = mysqli_fetch_array($consulta)){
            $this->idcliente= $this->filas ['idcliente'];
          $this->nombre = $this->filas ['nombre'];
          $this->apellidos=$this->filas ['apellidos'];
          $this->email = $this->filas['email'];
          $this->phone = $this->filas['phone'];
          $this->phonemovil = $this->filas['phonemovil'];
          $this->address=$this->filas['address'];
          $this->addresss=$this->filas['addresss'];
          $this->cp=$this->filas['cp'];
          $this->ciudad=$this->filas['ciudad'];
          $this->provincia=$this->filas ['provincia'];
          $this->pais=$this->filas['pais'];
          $this->nif=$this->filas['nif'];
           $this->edad=$this->filas['edad'];
            }
           
}
$conexion->cerrarbbdd();
   }      
   public function insertarUsuario(){
        
        $conexion = new conexion();
        $conexion->conectar();
        $conexion->iniciartransaccion();
        $sql1 ="SELECT MAX(idcliente) AS id FROM clientes";
        $clienteid = $conexion->consultar($sql1);
         if ($row = mysqli_fetch_row($clienteid)) 
           {
         $variable = trim($row[0]);
             }
        $sql2 = "INSERT INTO usuario (idcliente,usuario,password) VALUES ('$variable','$this->usuario','$this->password')";
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