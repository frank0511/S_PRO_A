<?php

class M_utils extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    
    function getPermisosByUsuario($idUsuario)
    {
        $sql = "SELECT m.iconoModulo,
		               m.nombreModulo,
		               m.rutaModulo
	              FROM modulo m,
            		   permiso p,
            		   rol r,
            		   usuario u
            	 WHERE p.idModulo       = m.idModulo
                   AND p.idRol          = r.idRol
            	   AND u.idRol           = r.idRol
                   AND u.idUsuario       = ?";
    
        $result = $this->db->query($sql, array($idUsuario));
        return $result->result();
    }
    


    function getTipoDocumento()
    {
        $sql = 'SELECT  idTipoDocumento,
                        descripcion
                  FROM tipodocumento';
        $result =  $this->db->query($sql);
        return $result->result();
    }
    
    function getRolByUser($idUsuario)
    {
        $sql = 'SELECT idRol
                  FROM usuario
                 WHERE idUsuario = ?;';
        $result = $this->db->query($sql, array($idUsuario));
        return $result->row()->idRol;
    }
    
    function getAllDepartamentos()
    {
        $sql = "SELECT  flag_Departamento,
                        departamento
                  FROM  ubigeo
              GROUP BY  flag_Departamento";
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    function getAllProvincias($flag_Dep)
    {
        $sql = "SELECT  flag_Provincia,
                        provincia
                  FROM  ubigeo
                 WHERE  flag_Departamento = ?
                   AND  flag_Provincia != 0
              GROUP BY  flag_Provincia";
        $result = $this->db->query($sql, array($flag_Dep));
        return $result->result();
    }
    
    function getAllDistritos($flag_Dep, $flag_Prov)
    {
        $sql = "SELECT  flag_Distrito,
                        distrito
                  FROM  ubigeo
                 WHERE  flag_Departamento = ?
                   AND  flag_Provincia = ?
                   AND  flag_Distrito != 0";
        $result = $this->db->query($sql, array(
            $flag_Dep,
            $flag_Prov
        ));
        return $result->result();
    }
    
    function getUbigeo($departamento, $provincia, $distrito)
    {
        $sql = "SELECT  idLocalizacion
                  FROM  localizacion
                 WHERE  flag_Dep = ?
                   AND  flag_Prov = ?
                   AND  flag_Dist = ?";
        $result = $this->db->query($sql, array(
            $departamento,
            $provincia,
            $distrito
        ));
        return $result->row()->idLocalizacion;
    }
    function getAllRoles(){
      $sql = "SELECT  idRol, nombreRol
                  FROM  rol";
        $result = $this->db->query($sql);
        return $result->result();
    }
}    

