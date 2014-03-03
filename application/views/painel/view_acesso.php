<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row">
	<div class="large-6 small-12 columns">
		<div class="large-6 columns large-centered">
			<img src = 'img/higis-logo.png'/>
		</div>
	</div>
	<div class="large-6 small-12 columns">
		<div class="large-10 columns">
			<h4>Faça seu login de acesso</h4>
				<?php
				$atributos = array('id' => 'form');
				echo form_open('index.php/inicio/form1',$atributos);
				?>  
		    <label>Login ou CPF
		    	<input type='text' name ='acesso' set_value = 'acesso' autofocus required
		    </label>
		    <label>Senha
		    	<input type='password' name ='password' required
		   	</label>
		    <div class="large-6 colmuns"><input type='submit' name='logar' class='button success small espaco-left radius left' value='Entrar no Sistema' /></div>
		    <div class="large-6 columns"><h7 class='acesso left espaco-top'><a href='nova_senha'>Esqueci minha senha</a></h7></div>	
		    <?php 
		        echo form_close();
			?>
			
		</div>
</div>