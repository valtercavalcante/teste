
<?php
$atributos = array('id' => 'form');
echo form_open('usuario/cadastra',$atributos);
?>  
<form>
  <div class="row">
    <div class="small-8">
      <div class="row">
        <div class="small-3 columns">
          <label for="nome" class="right inline">Nome:</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="nome" name="nome" placeholder="Nome do usuario" size="40" maxlength="40" required="">
        </div>
      </div>
      <div class="row">
        <div class="small-3 columns">
          <label for="cpf" class="right inline">CPF:</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="cpf" name="cpf" placeholder="CPF do usuario" size="14" maxlength="14" required="">
        </div>
      </div>
      <div class="row">
        <div class="small-3 columns">
          <label for="nome" class="right inline">Senha:</label>
        </div>
        <div class="small-9 columns">
          <input type="password" id="senha" name="senha" placeholder="Senha do usuario" size="10" maxlength="10" required="">
        </div>
      </div>
      <div class="row">
        <div class="small-3 columns">
          <label for="nome" class="right inline">Repetir Senha:</label>
        </div>
        <div class="small-9 columns">
          <input type="password" id="senha" name="senha" placeholder="Senha do usuario" size="10" maxlength="10" required="">
        </div>
      </div>
	  <div class="row">
        <div class="small-3 columns">
          <label for="modulos" class="right inline">Modulos:</label>
        </div>
        <div class="small-9 columns">
          <?php foreach($modulos as $modulo){ ?>
          	<input type="checkbox" name="modulos" value="<?php echo $modulo->codigo;?>"><?php echo $modulo->nome; ?><br>        		
          <?php	} ?>
        </div>
      </div>
	  <div class="row">
        <div class="small-3 columns">
          <label for="permissao" class="right inline">Permissao:</label>
        </div>
        <div class="small-9 columns">
          <select name="permissao">
          	<option value='1'>Administrador</option>
          	<option value='2'>Usuario</option>
          	<option value='3'>Visualizador</option>
          </select>
        </div>
      </div>      
    </div>
  </div>
  <?php echo form_submit('','Cadastrar','class=botao') ;?>
</form> 
<?php
echo form_close();
?> 