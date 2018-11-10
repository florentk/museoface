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

				  
		  <div id=form>
				  <div>Pseudo : <?php echo form_input('pseudo', set_value("nom") , 'placeholder="Pseudo" autofocus'); ?></div>
				  <div>Adresse mail : <?php echo form_input('email', set_value("email"), 'placeholder="Mail"'); ?></div>
		  </div>

    <?php echo form_submit('submit', 'C\'est parti !');?>
		  
		</form>

	</div>

	<p class="footer">Museoface</p>
</div>

</body>
</html>
