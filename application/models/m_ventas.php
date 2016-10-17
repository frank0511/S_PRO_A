<?php

class M_ventas extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    function getAllVentas(){
        $sql = 'SELECT  v.codigo,
                        p.nombres,
                        v.total,
                        DATE_FORMAT(v.fechaRegistro, "%Y/%m/%d") fechaRegistro
                  FROM  venta v,
                        persona p
                 WHERE  v.idUsuario = p.idUsuario
              ORDER BY  v.fechaRegistro ASC;';
        $result = $this->db->query($sql, array());
        return $result->result();
    }
    
    function getAllVentasByUser($registradoPor){
        $sql = 'SELECT  v.codigo,
                        p.nombres,
                        v.total,
                        DATE_FORMAT(v.fechaRegistro, "%Y/%m/%d") fechaRegistro
                  FROM  venta v,
                        persona p
                 WHERE  v.registradoPor = ? 
                   AND  v.idUsuario = p.idUsuario
              ORDER BY  v.fechaRegistro ASC;';
        $result = $this->db->query($sql, array($registradoPor));
        return $result->result();
    }
    
    function getBoxDay()
    {
        $sql = 'SELECT  SUM(total) caja
                  FROM  venta 
                 WHERE  fechaRegistro = curdate();';
        $result = $this->db->query($sql, array());
        return $result->row()->caja;
    }
}    
