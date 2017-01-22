<?php

class conexion{
    private $servidor;
    private $userbbdd;
    private $bbdd;
    private $pwbbdd;
    public $con;
    public $consulta;
    public $buscarray;
    public $variable;
    public $resultado;
    
    public function __construct() {
        $this->servidor='localhost';
        $this->userbbdd='root';
        $this->bbdd='proyectoCeac';
        $this->pwbbdd='';
        $this->variable;
    }
    
    public function conectar(){
        
        $this->con = mysqli_connect($this->servidor,$this->userbbdd,$this->pwbbdd,$this->bbdd);
    
        /* Comprobar la conexión */
            if (mysqli_connect_errno()) {
            printf("Falló la conexión: %s\n", mysqli_connect_error());
            exit();
}
        
    }
    public function consultar($sql){
         
        $this->consulta=mysqli_query($this->con,$sql);
        return $this->consulta;
        if(!$this->consulta){
            echo ("Falló la consulta:");
            echo $thinbs->consulta;
            exit();
        }
    }
    
   
    public function errortransaccion($resultado){
        if(!$resultado){
         echo "Error en la transaccion:".  mysqli_error($this->con);
         mysqli_rollback($this->con);
         exit;
    }
    }
   public function iniciartransaccion(){
       mysqli_autocommit($this->con, FALSE);
       mysqli_begin_transaction($this->con);
       }
   
   public function commit(){
              
       mysqli_commit($this->con);
       if (!mysqli_commit($this->con)) {
        print("Falló la consignación de la transacción\n");
        exit();
        }
   }
    public function cerrarbbdd(){
        
       mysqli_close($this->con);
}


}
?>
