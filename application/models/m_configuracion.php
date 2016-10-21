<?php
class M_configuracion extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    function getAllRoles()
    {
        $sql = "    SELECT  idRol AS idRol,
                            CONCAT(UCASE(LEFT(nombreRol, 1)), LCASE(SUBSTRING(nombreRol, 2))) AS nombreRol
                      FROM  rol
                  GROUP BY  nombreRol";
        $result =  $this->db->query($sql);
        return $result->result();
    }
    
    function getPermisosByRol($idRol)
    {
        $sql = "    SELECT  @rownum:=@rownum+1 AS num, 
                            CONCAT(UCASE(LEFT(p.idModulo, 1)), LCASE(SUBSTRING(p.idModulo, 2))) AS idModulo, 
                            m.nombreModulo AS nombreModulo
                      FROM  (SELECT @rownum:=0) r, 
                            modulo m, 
                            permiso p, 
                            rol r 
                     WHERE  p.idModulo = m.idModulo 
                       AND  p.idRol = r.idRol 
                       AND  r.idRol = ?
                  GROUP BY  m.nombreModulo";
        $result =  $this->db->query($sql, array($idRol));
        return $result->result();
    }
    
}