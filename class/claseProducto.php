<?php
class Producto {
    
public $id;
public $nombre;
public $desc;
public $imagen;
public $precio;
public $cantidad;
public $enstock;
public $codigo;
public $fecha;
public $articulos;
public $articulo;
public $rows;

  
function precioTotal(){
    return_format($this->precioVenta*$this->cantidad,2,'.','');
} 
public function nuevoProducto() {
$conexion =new conexion();
    $conexion->conectar();
    $sql="select * from producto";
    $this->consulta =$conexion->consultar($sql);
    
    $this->rows = mysqli_num_rows($this->consulta);
    

    for ($i=0;$i<$this->rows;$i++){ 
        $this->articulo = mysqli_fetch_assoc($this->consulta);
        $this->articulos[$i] = $this->articulo;}
    

$conexion->cerrarbbdd();
}
    }


?>

