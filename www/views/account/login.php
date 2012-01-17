<div id="body">
<?php echo form_open('account/login'); ?>
<code>
<?php echo validation_errors(); ?>
<?
      if(isset($error)){
         echo "<p>".$error."</p>";
      }
      echo form_error('maillogin');
      ?>
<?php form_error('passwordlogin');?>
</code>
<div id="LoginUsuarios">
   <div class="fila">
      <div class="LoginUsuariosCabecera">Username:</div>
      <div class="LoginUsuariosDato"><input type="text" name="username" value="<?php echo set_value('username'); ?>" size="25" /></div>
   </div>      
   <div class="fila">
      <div class="LoginUsuariosCabecera">Contrase&ntilde;a:</div>
      <div class="LoginUsuariosDato"><input type="password" name="password" value="<?php echo set_value('password'); ?>" size="25" /></div>
   </div>      
   <div class="fila">
      <div class="LoginUsuariosCabecera"><input type="submit" value="Ingresar"></div>
      <div class="LoginUsuariosDato"></div>
   </div>      
</div>
</form>