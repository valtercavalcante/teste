<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Higia - Sistema de Gestão Hospitalar</title>
<link href="<?php echo base_url('css/foundation.min.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('css/navegacao.css');?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url('js/jquery.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.maskedInput.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.maskMoney.js');?>"></script>
<!-- loading javascripts -->
<?php echo $js; ?>
<!-- loading javascripts -->
</head>
<body>
	
	  	<?php $this->load->view('header'); ?>
	  	<!-- area reservada para o conteudo da pagina -->
		<div class="row">
			<fieldset><legend><?php echo $legenda; ?></legend>  
		  	<?php $this->load->view($conteudo); ?>
		  	<!-- fim da area reservada para conteudo da pagina -->
			</fieldset>  
		  	<?php $this->load->view('rodape'); ?>
		</div>
</body>
</html>