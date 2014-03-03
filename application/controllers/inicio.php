<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	//Carrega o construtor do helper_funcao
    public function index()
	{
    	$data['legenda']= 'Login';
        $this->load->helper('form');
        $this->load->helper('url');        
        $data['js'] = load_js(array('jsCadastroUsuario.js'));//carrega o js para formatar os campos
        $data['conteudo'] = 'painel/view_acesso';
        $this->load->view('tplCreate',$data);//tplCreate = Template padrao utilizado para cadastros
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/inicio.php */