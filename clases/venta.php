<?php

class venta
{
    function __construct()
    {
        require_once ('conexion.php');
        $this->conexion=new conexion();
    }

    function insertar($folio, $total, $fkusuario, $estatus){
        $sql="INSERT INTO venta (idventa, folio, fecha, hora, total, fkusuario, estatus) values (NULL, '{$folio}', NOW(), NOW(), '{$total}', '{$fkusuario}', '{$estatus}')";
        $respuesta=$this->conexion->query($sql);
        $id=$this->conexion->insert_id;
        return $id;
    }
    function insertarDetalle($fkproducto,$fkventa, $cantidad, $subtotal, $estatus){
        $sql="INSERT INTO detalle_venta (iddetalle, fkproducto, fkventa, cantidad,subtotal, estatus) VALUES (null,'{$fkproducto}', '{$fkventa}', '{$cantidad}', '{$subtotal}', '{$estatus})";
        $respuesta=$this->conexion->query($sql);
        return $this->conexion->insert_id;
    }
    function verCarrito($idusuario){
        $sql="SELECT * FROM venta WHERE fkusuario = '{$idusuario}' AND estatus=0";
        $respuesta=$this->conexion->query($sql);
        return $respuesta;
    }

    function mostrarVenta($idusuario, $estatus){
        $sql="SELECT * FROM venta v LEFT JOIN detalle_venta d ON v.idventa=d.fkventa INNER JOIN producto p ON p.idproducto=d.fkproducto WHERE v.fkusuario='{$idusuario}' AND v.estatus='{$estatus}' ";
        $respuesta=$this->conexion->query($sql);
        return $respuesta;
    }
}

?>