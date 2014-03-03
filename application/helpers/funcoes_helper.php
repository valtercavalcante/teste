<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//carrega um modeulo do sistema a tela solicitada


    function load_modulo($modulo=NULL, $tela=NULL, $diretorio='painel'){
    	$CI =& get_instance();
     	if ($modulo!=NULL):
         return $CI->load->view("$diretorio/$modulo",array('tela'=>$tela), TRUE);
     	else:
         return FALSE;
     	endif;
}    
	
//seta valores do array tema

     function set_tema($prop, $valor, $replace=TRUE){
         $CI =& get_instance();
         $CI->load->library('sistema');
         
         if($replace):
             $CI->sistema->tema[$prop] = $valor;
         else:
             if(!isset($CI->sistema->tema[$prop])) $CI->sistema->tema[$prop] = '';
             $CI->sistema->tema[$prop] .= $valor;
             endif;
     }
//retorna os valores do array Tema da classe sistema


    function get_tema(){

           $CI =& get_instance();
           $CI->load->library('sistema');
           return $CI->sistema->tema;
}

//Inicializa o painel adm carregando os recursos necessários


    function init_sistema(){
        $CI =& get_instance();
        $CI->load->library(array('sistema','session','form_validation','parser','cart'));
        $CI->load->helper(array('form','url','array','text','html'));

        //carrega templates das views, css, js, titulos e metas Tags        
        set_tema('titulo_padrao', 'Higia Sistema');
        set_tema('rodape', '<div class="large-6 columns">
        					<p>&copy; 2014 | todos os direitos reservados para G7 sistema</p>
        					</div><div class="large-6 columns text-right">
        					'.anchor('#','<p>Suporte</p>').'</div>');
        set_tema('template','painel_view');

        set_tema('headerinc', load_css(array('normalize','foundation','sistema')), FALSE);
		set_tema('headerinc', load_js(array('vendor/custom.modernizr')), FALSE);
        set_tema('footerinc', load_js(array('vendor/jquery','foundation.min',
        'foundation/foundation.alerts','foundation/foundation.tab'
        )), FALSE);
    }
    
//carrega um template passando uma array tem como parametro


    function load_template(){
        $CI =& get_instance();
        $CI->load->library('sistema');
        $CI->parser->parse($CI->sistema->tema['template'], get_tema());
               
    }
//carrega os arquivos css

    
    function load_css($arquivo=NULL, $pasta='css', $media='all'){
        if ($arquivo != NULL):
            $CI =& get_instance();
            $CI->load->helper('url');
            $retorno = '';
        if (is_array($arquivo)):
        foreach ($arquivo as $css):
        $retorno .= '<link rel="stylesheet" type="text/css" href="'.base_url("$pasta/$css.css").'" media="'.$media.'" />';
        endforeach;
            else:
        $retorno = '<link rel="stylesheet" type="text/css" href="'.base_url("$pasta/$arquivo.css").'" media="'.$media.'" />';        
            endif;
        endif;
        return $retorno;
}

//carrega um ou vários .js de uma pasta ou servidor


    function load_js($arquivo=NULL, $pasta='js', $remoto=FALSE){
         if ($arquivo != NULL):
            $CI =& get_instance();
            $CI->load->helper('url');
            $retorno = '';
            if (is_array($arquivo)):
                foreach ($arquivo as $js):
             if($remoto):
                  $retorno .= '<script type="text/javascript" src="'.$js.'"></script>';
             else:
                  $retorno .= '<script type="text/javascript" src="'.base_url("$pasta/$js.js").'"></script>';        
            endif;
            endforeach;
        else:
             if($remoto):
                  $retorno .= '<script type="text/javascript" src="'.$arquivo.'"></script>';
             else:
                  $retorno .= '<script type="text/javascript" src="'.base_url("$pasta/$arquivo.js").'"></script>';        
            endif;
          endif;
        endif;
        return $retorno;
       
    }

    
//Mostra errosde validação
    
    
    function erros_validacao($name=NULL){
        
    if(validation_errors()) echo form_error($name,'<small class="error erro">','</small>');   
       
    }

//Verificar se usuário está logado no sistema


    function esta_logado($redir=TRUE){
        $CI =& get_instance();
        $CI->load->library('session');
        $user_status = $CI->session->userdata('user_logado');
       
        if(!isset($user_status) || $user_status != TRUE ):
            $CI->session->sess_destroy();
            if ($redir):
                
                set_msg('errologin','Acesso restrito, faça login antes de prosseguir', 'erro');
                redirect('inicio/buscar_restaurantes');
            else:
                return FALSE;
            endif;
            else:
                return TRUE;
            endif;
}

//Define mensagem das telas


function set_msg($id='msgerro', $msg=NULL, $tipo='erro'){
    $CI =& get_instance();
    switch ($tipo):
		case 'warning':
            $CI->session->set_flashdata($id, '<div data-alert class="alert-box warning">'.$msg.'<a href="#" class="close">&times;</a></div>');
            break;
        case 'erro':
            $CI->session->set_flashdata($id, '<div data-alert class="alert-box alert">'.$msg.'<a href="#" class="close">&times;</a></div>');
            break;
        case 'sucesso':
            $CI->session->set_flashdata($id, '<div data-alert class="alert-box success">'.$msg.'<a href="#" class="close">&times;</a></div>');
            break;       
        default:
            $CI->session->set_flashdata($id, '<div data-alert class="alert-box alert">'.$msg.'<a href="#" class="close">&times;</a></div>');
            break;
       endswitch;
}
    
//verifica se existe uma mensagem para ser exibida na tela
function get_msg($id, $printar=TRUE){
	$CI =& get_instance();
    if ($CI->session->flashdata($id)):
        if($printar):
            echo $CI->session->flashdata($id);
            return TRUE;
        else:
            return $CI->session->flashdata($id);
        endif;
   endif;
   return FALSE;
}

//verifica se o usuario atual é admnistrador
 function is_admin($set_msg=FALSE){
     $CI =& get_instance();
     $user_admin = $CI->session->userdata('user_admin');
     if(!isset($user_admin) || $user_admin != TRUE):
         set_msg('msgerro', 'Seu usuário não tem permissão para executar esta operação', 'erro');
         return FALSE;
            else:
         return TRUE;
     endif;
}
//gera os breadcrumb com base no controller tual
function breadcrumb(){
    $CI =& get_instance();
    $CI->load->helper('url');
    $classe = ucfirst($CI->router->class);
    if($classe=='Painel'):
        $classe = anchor($CI->router->class,'Painel adm - Fast-Food Agora');
    else:
        $classe = anchor($CI->router->class,$classe);
    endif;
    
    $metodo = ucwords(str_replace('_', ' ', $CI->router->method));
    if ($metodo && $metodo != 'Index'):
        $metodo = " &raquo; ".anchor($CI->router->class."/".$CI->router->method, $metodo);
    else: 
        $method = '';
    endif;
    return '<p>Sua localização: '.anchor('painel','Painel').' &raquo; '.$classe.$metodo.'</p>';
    
}

//seta um registro para auditoria
function auditoria($operacao, $obs, $query=TRUE){
        $CI =& get_instance();
        $CI->load->library('session');
        if(esta_logado(FALSE)):
        $user_id = $CI->session->userdata('user_id');
        $user_login = $CI->usuarios->get_byid($user_id)->row()->login;
        else:
            $user_login = 'Desconhecido';
        endif;
        if($query):
            $last_query = $CI->db->last_query();
        else:
            $last_query = '';
        endif;
        
        $dados = array(
        'usuario'=> $user_login,
        'operacao'=> $operacao,
        'query'=>$last_query,
        'obs'=>$obs
        );
        $CI->auditoria->do_insert($dados);        
}
//gera miniatura casa não exista


function thumb($imagem=NULL, $largura=100, $altura=75, $geratag=TRUE){
           $CI =& get_instance();
           $CI->load->helper('file');
           
           $thumb = $largura."x".$altura."_".$imagem;
           $thumbinfo = get_file_info('./uploads/thumbs/'.$thumb);
           
           if($thumbinfo!=FALSE):
               $retorno = base_url('uploads/thumbs/'.$thumb);
           else:
               $CI->load->library('image_lib');
               $config['image_library'] = 'gd2';
               $config['source_image'] = './uploads/'.$imagem;
               $config['new_image'] = './uploads/thumbs/'.$thumb;
               $config['maintain_ratio'] = TRUE;
               $config['width'] = $largura;
               $config['height'] = $altura;
               $CI->image_lib->initialize($config);
               if ($CI->image_lib->resize()):
                   $CI->image_lib->clear();
                   $retorno = base_url('uploads/thumbs/'.$thumb);
               else:
                   $retorno = FALSE;
               endif;
             endif;
             if($geratag && $retorno != FALSE) $retorno = '<img src="'.$retorno.'" alt="" />';
             return $retorno;
}


