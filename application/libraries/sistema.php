<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HG_Sistema {
    protected $CI;
    public $tema = array();
    
    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->helper('funcoes');
    }
    
}

/* End of file sistema.php */
/* Location: ./application/libraries/sistema.php */