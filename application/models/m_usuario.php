<?php

class M_usuario extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    function validarUsuario($user, $pass)
    {
        $query = "SELECT idUsuario,
                         nombreUsuario
	                FROM usuario
	               WHERE nombreUsuario = ?
                     AND claveUsuario = ?";
        $result = $this->db->query($query, array(
            $user,
            $pass
        ));
        $res = $result->row_array();
    
        return $res;
    }
    
    function getDatosUsuario($idUsuario)
    {
        $sql = "SELECT      u.idUsuario,
                            u.nombreUsuario,
                            r.nombreRol,
                            r.idRol,
                            t.nombres
            		 FROM	usuario u,
                            rol r,
                            trabajador t
            		WHERE	u.idUsuario = ?
            		  AND	u.idRol = r.idRol
                      AND   u.idUsuario = t.idUsuario";
        $result =  $this->db->query($sql, $idUsuario);
        return ($result->row_array());
    }
}    
