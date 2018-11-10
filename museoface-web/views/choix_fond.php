<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Choisi ta quête</title>

</head>
<body>

<div id="container">
	<h1>Choisi ton environnement</h1>

	<div id="body">

				
		  
  <?php echo form_open('welcome/valide_fond'); ?>
  
		  <div id=form>
				  <?php echo form_input('fond_id', set_value("fond_id") , 'placeholder="Code" autofocus'); ?>
		  </div>

    <?php echo form_submit('submit', 'Valider !');?>
  
  </form>

	</div>

	<p class="footer">Museoface</p>
</div>

</body>
</html>
