<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Choisi ta quête</title>
	<style>
	img {max-width: 90%;height: auto;}
	</style>
</head>
<body>

<div id="container">
	<h1>Bravo ! Tu peux créer ton portrait !</h1>
	
	<h2> <?php echo "$portrait->titre" ?> </h2>
	
	<div id="photo">
	  <img src="<?php echo base_url($img); ?>"></img>
	</div>

	<div id="body">

  <div>Ton email : <?php echo "$email" ?></div>
  <div>Ton pseudo : <?php echo "$pseudo" ?></div>
  <div>Ton environnement : <?php echo "$fond_id" ?></div>
  
  <a href="<?php echo base_url("index.php"); ?>">Recommencer</a>
  
  </form>

	</div>

	<p class="footer">Museoface</p>
</div>

</body>
</html>
