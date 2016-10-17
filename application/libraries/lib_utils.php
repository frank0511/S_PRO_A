<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_utils
{

    public function buildArbolPermisos($permisos)
    {
        $res = null;
        $cons_id_menu_padre = null;
        
        foreach ($permisos as $hijo) {
            $res .= '<a class="mdl-navigation__link" href="'.base_url().$hijo->rutaModulo.'"><i class="mdi mdi-'.$hijo->iconoModulo.'"></i> '.$hijo->nombreModulo.'</a>';
        }
        
        return $res;
    }

    function generatePassword()
    {
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena = strlen($cadena);
        
        $pass = "";
        $longitudPass = 10;
        
        for ($i = 1; $i <= $longitudPass; $i ++) {
            $pos = rand(0, $longitudCadena - 1);
            $pass .= substr($cadena, $pos, 1);
        }
        
        return $pass;
    }
    
    function generateCode($type, $indice)
    {
        if($indice <= 8){
            return $type.date("Y").'000000'.($indice+1);
        } else if($indice >= 9      || $indice <= 98){
            return $type.date("Y").'00000'.($indice+1);
        } else if($indice >= 99     || $indice <= 998){
            return $type.date("Y").'0000'.($indice+1);
        } else if($indice >= 999    || $indice <= 9998){
            return $type.date("Y").'000'.($indice+1);
        } else if($indice >= 9999   || $indice <= 99998){
            return $type.date("Y").'00'.($indice+1);
        } else if($indice >= 99999  || $indice <= 999998){
            return $type.date("Y").'0'.($indice+1);
        } else if($indice >= 999999 || $indice <= 9999998){
            return $type.date("Y").($indice+1);
        }
    }
    
}