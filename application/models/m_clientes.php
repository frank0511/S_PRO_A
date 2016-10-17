<?php

class M_Clientes extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getComboTipoDocumento()
    {
        $sql = "SELECT idTipoDocumento, descripcion FROM tipodocumento";
        $result =  $this->db->query($sql);
        return $result->result();
    }
}    
