<?php


class factura {
        private $id;
        private $productos;
         private $producto;
        private $precioVenta;
        private $cantidad;
        private $subtotal;
        private $total;
        public $factura_id;
        public $facturas = array();
        public $factura;
        public $fechaFactura;
        public $totalFactura;
        // la pate constructor se va
     /*public function __construct ($id,$productos,$precioVenta,$cantidad,$subtotal){
         
         $this->id=$id;
         $this->productos=$productos;
         $this->cantidad=$cantidad;
         $this->precioVenta=$precioVenta;
         $this->subtotal=$subtotal;
         
     }*/
       //hacemos dos operaciones por un lado guardamos la factura
     //y por el otro guardamos el detalle de la factura
    function guardarFactura($idcliente,$total){
        $conexion = new conexion();
        $conexion->conectar();
        $conexion->iniciartransaccion();
        //$date =  strftime( "%Y-%m-%d %H-%M-%S", time() );
        $sql="INSERT INTO factura (fechaFactura,idcliente,totalFactura) VALUES (now(),$idcliente,$total)";
        
        $resultado = $conexion->consultar($sql);
        $conexion->errortransaccion($resultado);
        //mysqli_query($this->conexion,"SET AUTOCOMMIT = 0;");
        //mysqli_query($this->conexion,"BEGIN");
        if($resultado){
         $conexion->commit();
         }
         return $resultado;
         
       $conexion->cerrarbbdd();
        
       // $rs=$conexion->consulta($sql);
     /*if(!rs){
         echo "Error en la transaccion:".  mysqli_error($this->conexion);
         mysqli_query($this->conexion,"ROLLBACK");
         exit;*/
    }
     function guardarDetalleFactura($id,$producto,$precio,$cantidad){
         $conexion = new conexion();
         $conexion->conectar();
         $conexion->iniciartransaccion();
         
         $sql2="SELECT MAX(facturaid) AS id FROM factura";
         $facturaid = $conexion->consultar($sql2);
         if ($row = mysqli_fetch_row($facturaid)) 
           {
         $facid = trim($row[0]);
             }
              
         $sql="INSERT INTO facturadetalle(productoId,facturaId,nombreproducto,cantidad,precioVenta) VALUES ('$id','$facid','$producto',$cantidad,$precio)";
        
             $rs=$conexion->consultar($sql);
             $conexion->errortransaccion($rs);
             $conexion->commit();
             //return $facturaId;
             $conexion->cerrarbbdd();
    } 
    function consultarFacturas($idcliente){
        $conexion=new conexion();
        $conexion->conectar();
        //$idcliente = $_SESSION['idcliente'];
        $sql="SELECT * FROM factura WHERE idcliente=$idcliente";
        $resultado =$conexion->consultar($sql);    
        //echo $sql;
        //$this->facturas=mysqli_fetch_array($resultado);
        //if($resultado){
        //echo count($resultado);
        /*while ($this->factura = mysqli_fetch_array($resultado)){
            $this->facturaid = $this->factura['facturaId'];
            $this->fechaFactura = $this->factura['fechaFactura'];
            $this->totalFactura = $this->factura['totalFactura'];
            */
       $this->rows = mysqli_num_rows($resultado);
       //echo $this->rows;
       //$totalfilas = count($this->rows);
        //$this->rows=$this->rows+1;
       // while ($this->rows = mysqli_num_rows($resultado)){
        for ($i=0;$i<$this->rows;$i++){
            
        $this->factura = mysqli_fetch_assoc($resultado);
        $this->facturas[$i] = $this->factura;
        
        }
        /*
        while ($this->factura[] = mysqli_fetch_assoc($resultado)!=NULL){
            $this->factura =array('facturaId'=>'facturaid','fechaFactura'=>'fechaFactura','totalFactura'=>'totalFactura');
        }           
        return $this->facturas;*/
        //foreach ($this->factura as $indice)
        //echo $this->factura[$indice];
        //implode ($this->facturas);
       // }
    //else{
    //    echo "error en la consulta";
    }
    //}
   
     
    function consultarDetalleFacturas($idfactura){
        $conexion=new conexion();
        $conexion->conectar();
       
       
        $sql="SELECT * FROM facturadetalle WHERE facturaId=($idfactura)";
        $resultado=$conexion->consultar($sql);  
         //$detallefacturas=mysqli_fetch_array($resultado);
         $this->rows = mysqli_num_rows($resultado);
       //echo $this->rows;
       //$totalfilas = count($this->rows);
        //$this->rows=$this->rows+1;
       // while ($this->rows = mysqli_num_rows($resultado)){
        for ($i=0;$i<$this->rows;$i++){
            
        $this->detallefactura = mysqli_fetch_assoc($resultado);
        $this->facturas[$i] = $this->detallefactura;
        
        }
    }
        
}

?>