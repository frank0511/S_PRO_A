<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('_log')) {
    function _log($var) {
        log_message('error', $var);
    }
}

if(!function_exists('_logLastQuery')) {
    /**
     * Valida si es entero
     * @param $input - valor a evaluar
     * @return bool true / false
     */
    function _logLastQuery($marca = null){
        $CI =& get_instance();
        log_message('error', $marca.' - '.$CI->db->last_query());
    }
}


if(!function_exists('_encodeCI')) {
    /**
     * Encripta usando codeigniter encode
     * @author dfloresgonz
     * @since 22.03.2016
     * @param $toEncrypt variable que sera encriptada
     * @return variable encriptada
     */
    function _encodeCI($toEncrypt) {
        $CI =& get_instance();
        return $CI->encrypt->encode($toEncrypt);
    }
}

if(!function_exists('_decodeCI')) {
    /**
     * Desencripta usando codeigniter decode
     * @author dfloresgonz
     * @since 22.03.2016
     * @param $toDecrypt variable que sera desencriptada
     * @return variable desencriptada
     */
    function _decodeCI($toDecrypt) {
        $CI =& get_instance();
        return $CI->encrypt->decode($toDecrypt);
    }
}

if(!function_exists('_simpleEncrypt')) {
    /**
     * Desencripta usando mcrypt_encrypt
     * @author dfloresgonz
     * @since 22.03.2016
     * @param $toDecrypt variable que sera desencriptada
     * @return variable encriptada
     */
    function _simple_encrypt($toEncrypt) {
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, CLAVE_ENCRYPT, $toEncrypt, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }
}

if(!function_exists('_simpleDecrypt')) {
    /**
     * Desencripta usando mcrypt_decrypt
     * @author dfloresgonz
     * @since 22.03.2016
     * @param $toDecrypt variable que sera desencriptada
     * @return variable desencriptada
     */
    function _simple_decrypt($toDecrypt) {
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, CLAVE_ENCRYPT, base64_decode($toDecrypt), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }
}

if(!function_exists('_simpleDecryptInt')) {
    /**
     * Desencripta usando mcrypt_decrypt para integer, retorna null si no desencripto bien
     * @author dfloresgonz
     * @since 22.03.2016
     * @param $toDecrypt variable que sera desencriptada
     * @return variable desencriptada
     */
    function _simpleDecryptInt($toDecrypt) {
        $dec = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, CLAVE_ENCRYPT, base64_decode($toDecrypt), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
        if(!is_numeric($dec)){
            $dec = null;
        }
        return $dec;
    }
}

if(!function_exists('__validFecha')) {
    /**
     * Valida fecha en formato DD/MM/YYYY
     * @param  $fecha
     * @return boolean
     */
    function __validFecha($fecha){
        $test_arr  = explode('/', $fecha);
        if (count($test_arr) == 3) {
            if (checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {//MES / DIA / YEAR
                return true;
            }
            return false;
        }
        return false;
    }
}

if(!function_exists('_post')) {
    /**
     * @author rvasquez
     */
    function _post($postIndex) {
        $CI =& get_instance();
        return $CI->input->post($postIndex);
    }
}

if(!function_exists('_get')) {
    /**
     * @author dfloresgonz
     */
    function _get($getIndex) {
        $CI =& get_instance();
        return $CI->input->get($getIndex);
    }
}

if(!function_exists('_getSesion')) {
    /**
     * @author rvasquez
     */
    function _getSesion($sessionIndex) {
        $CI =& get_instance();
        return $CI->session->userdata($sessionIndex);
    }
}

if(!function_exists('_setSesion')) {
    /**
     * @author dfloresgonz
     */
    function _setSesion($sessionArray) {
        $CI =& get_instance();
        return $CI->session->set_userdata($sessionArray);
    }
}

if(!function_exists('_ucwords')) {
    function _ucwords($palabra) {
        return mb_convert_case(mb_strtolower($palabra, 'iso-8859-1'), MB_CASE_TITLE, 'iso-8859-1');
    }
}

if(!function_exists('_ucfirst')) {
    function _ucfirst($palabra) {
        $newStr = '';
        $match = 0;
        foreach(str_split($palabra) as $k=> $letter) {
            if($match == 0 && preg_match('/^\p{L}*$/', $letter)) {
                $newStr .= _ucwords($letter);
                break;
            }else{
                $newStr .= $letter;
            }
        }
        return $newStr.substr($palabra,$k+1);
    }
}

if(!function_exists('__enviarEmail')) {
    function __enviarEmail($correoDestino,$asunto,$body,$doc = null) {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try{
            $CI =& get_instance();
            $CI->load->library('email');
            $configGmail = array(
                'protocol'  => PROTOCOL,
                'smtp_host' => SMTP_HOST,
                'smtp_port' => SMTP_PORT,
                'smtp_user' => CORREO_BASE,
                'smtp_pass' => PASSWORD_BASE,
                'mailtype'  => MAILTYPE,
                'charset'   => 'utf-8',
                'newline'   => "\r\n",
                'starttls'  => TRUE);
            $CI->email->initialize($configGmail);
            $CI->email->from(CORREO_BASE);
            $CI->email->to($correoDestino);
            $CI->email->subject($asunto);
            $CI->email->message($body);
            if($doc != null){
                $CI->email->attach($doc);
            }
            if ($CI->email->send()) {
                $data['error'] = EXIT_SUCCESS;
                $data['msj']   = '¡Te enviamos un correo!';
            } else {
                $err = print_r($CI->email->print_debugger(), TRUE);
                throw new Exception($err);
            }
        } catch(Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        return $data;
    }
}