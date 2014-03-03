<?php

class Usuario extends CI_Controller{

    function __construct()
    {
        // Call the Controller constructor
        parent::__construct();
        //$this->load->model('Usuario_model','mdl_usuario');
    }	

    function formCadastro() {
    	$this->load->model('modulo_model','mdl_modulo');//carrega o model que obtem os modulos do sistema
		$data['modulos'] = $this->mdl_modulo->listaAtivos();//obtem os modulos ativos do sistema na tabela modulos
        $this->load->helper('form');
        $this->load->helper('url');        
        $data['js'] = load_js(array('jsCadastroUsuario.js'));//carrega o js para formatar os campos
        $data['legenda'] = 'Cadastro de Usuario';
        $data['conteudo'] = 'usuario/formCadastro';
        $this->load->view('tplCreate',$data);//tplCreate = Template padrao utilizado para cadastros
    }
    
}
?>