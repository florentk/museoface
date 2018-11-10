<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Enregistrement</title>

</head>
<body>

<div id="container">
	<h1>Enregistrement</h1>

	<div id="body">
	
  <?php echo form_open('welcome/ajout_visiteur'); ?>

				  
		  <div>
				  <?php echo form_input('pseudo', set_value("nom") , 'placeholder="Pseudo" autofocus'); ?>
				  <?php echo form_input('email', set_value("email"), 'placeholder="Mail"'); ?>
		  </div>

    <?php echo form_submit('submit', 'C\'est parti !');?>
		  
		</form>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
