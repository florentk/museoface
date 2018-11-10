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
	<h1>Choisi ta quête</h1>

	<div id="body">

				  
		  <div id = "list">
				<div><a href= <?php echo base_url("index.php/welcome/quete?quete=1"); ?> "  > Face </a></div>
				<div><a href=" <?php echo base_url("index.php/welcome/quete?quete=2"); ?> "  > Profile </a></div>
		  </div>

	</div>

	<p class="footer">Museoface</p>
</div>

</body>
</html>
