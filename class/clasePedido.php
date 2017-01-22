<?php

class pedido {
        private $id;
        private $productos;
        private $producto;
        private $precioVenta;
        private $cantidad;
        private $subtotal;
        private $total;
        private $factura_id;
        private $situacionpedido;
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
    function guardarPedido($idcliente){
        $conexion = new conexion();
        $conexion->conectar();
        $conexion->iniciartransaccion();
        //$date =  strftime( "%Y-%m-%d %H-%M-%S", time() );
        $this->situacionpedido='recibido';
        $sql="INSERT INTO pedido (fechapedido,idcliente,situacionpedido) VALUES (now(),$idcliente,'$this->situacionpedido')";
        
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
     function guardarDetallePedido($productoid,$producto,$precio,$cantidad){
         $conexion = new conexion();
         $conexion->conectar();
         $conexion->iniciartransaccion();
         
         $sql2="SELECT MAX(idpedido) AS id FROM pedido";
         $pedidoid = $conexion->consultar($sql2);
         if ($row = mysqli_fetch_row($pedidoid)) 
           {
         $orderid = trim($row[0]);
             }
              //hay que hacer un array para que meta todos los datos de cada pedido en pedidos
             //o un for que meta cada pedido
         $sql="INSERT INTO lineapedido (productoid,pedidoid,nombreproducto,cantidad,precio) VALUES ('$productoid','$orderid','$producto','$cantidad','$precio')";
        
             $rs=$conexion->consultar($sql);
             $conexion->errortransaccion($rs);
             $conexion->commit();
             //return $facturaId;
             $conexion->cerrarbbdd();
    } 
     
        function consultarPedidos($idcliente){
        $conexion=new conexion();
        $conexion->conectar();
        //$idcliente = $_SESSION['idcliente'];
        $sql="SELECT * FROM pedido WHERE idcliente=$idcliente";
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
            
        $this->pedido = mysqli_fetch_assoc($resultado);
        $this->pedidos[$i] = $this->pedido;
        
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
   
     
    function consultarDetallePedidos($idpedido){
        $conexion=new conexion();
        $conexion->conectar();
       
       
        $sql="SELECT * FROM lineapedido WHERE pedidoid=($idpedido)";
        $resultado=$conexion->consultar($sql);  
         //$detallefacturas=mysqli_fetch_array($resultado);
         $this->rows = mysqli_num_rows($resultado);
       //echo $this->rows;
       //$totalfilas = count($this->rows);
        //$this->rows=$this->rows+1;
       // while ($this->rows = mysqli_num_rows($resultado)){
        for ($i=0;$i<$this->rows;$i++){
            
        $this->lineapedido = mysqli_fetch_assoc($resultado);
        $this->pedidos[$i] = $this->lineapedido;
        
        }
    }
}

