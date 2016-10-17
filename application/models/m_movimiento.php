<?php
class M_movimiento extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    function getInventario()
    {
        $sql = '    SELECT  m.idMovimiento,
                            p.idProducto,
                            p.nombre name,
                            m.stock stock,
                            DATE_FORMAT(m.fechaIngreso, "%Y/%m/%d") fecIngreso,
                            DATE_FORMAT( m.fechaSalida, "%Y/%m/%d") fecSalida
                      FROM  movimiento m, 
                            producto p 
                     WHERE  m.idProducto = p.idProducto
					   AND  idMovimiento
						IN	( SELECT MAX(idMovimiento) FROM movimiento GROUP BY idProducto )';
        $result =  $this->db->query($sql);
        return $result->result();
    }
    
    function getEntradasByProducto($idProducto) {
        $sql = '    SELECT  m.cantidadIngreso, 
                            s.nombreSucursal,
                            DATE_FORMAT( m.fechaIngreso, "%Y/%m/%d" ) fecIngreso,
                            CONCAT(t.nombres," ",t.ap_paterno) nombre
                      FROM  movimiento m,
                            sucursal s,
                            trabajador t
                     WHERE  m.idProducto = ? 
                       AND  m.flag_movimiento = '.FLG_ENTRADA.'
                       AND  m.idSucursal = s.idSucursal 
                       AND  m.idTrabajador = t.idUsuario
                  ORDER BY  m.fechaIngreso DESC ';  
        $result =  $this->db->query($sql, array($idProducto));
        return $result->result();
    }
    
    function getSalidasByProducto($idProducto) {
        $sql = '    SELECT  m.cantidadSalida, 
                            s.nombreSucursal,
                            DATE_FORMAT( m.fechaSalida, "%Y/%m/%d" ) fecSalida,
                            CONCAT(t.nombres," ",t.ap_paterno) nombre
                      FROM  movimiento m,
                            sucursal s,
                            trabajador t
                     WHERE  m.idProducto = ? 
                       AND  m.flag_movimiento = '.FLG_SALIDA.'
                       AND  m.idSucursal = s.idSucursal 
                       AND  m.idTrabajador = t.idUsuario
                  ORDER BY  m.fechaSalida DESC'; 
        $result =  $this->db->query($sql, array($idProducto));
        return $result->result();
    }
}
