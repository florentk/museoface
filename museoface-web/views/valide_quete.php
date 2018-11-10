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
	<h1><?php echo $titre ; ?></h1>
	
	<?php 
	if($recommence)
	  echo "<h2>C'est le mauvais portrait, recommence !</h2>"
  ?>

	<div id="body">

				  
		  <div id = "description">
        <?php echo $desc ; ?>
		  </div>
		  
  <?php echo form_open('welcome/verif_portrait'); ?>
  
		  <div id=form>
				  <?php echo form_input('portrait_id', set_value("portrait_id") , 'placeholder="Code" autofocus'); ?>
		  </div>

    <?php echo form_submit('submit', 'J\'essaye !');?>
  
  </form>

	</div>

	<p class="footer">Museoface</p>
</div>

</body>
</html>
