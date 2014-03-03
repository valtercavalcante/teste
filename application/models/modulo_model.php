<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modulo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function listaTodos(){//Lista todos os modulos do sistema
        $this->db->select('*');
        $this->db->from('modulos');
        $this->db->order_by('nome','ASC');
        $query = $this->db->get();
        return $query->result();
    }
    
	function listaAtivos(){//Lista os modulos ativos do sistema
        $this->db->select('*');
        $this->db->from('modulos');
        $this->db->where('flag', 1);
        $this->db->order_by('nome','ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
?>