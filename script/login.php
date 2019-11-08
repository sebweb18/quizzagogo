<?php include('functions2.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Connexion</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Pseudo</label>
			<input type="text" name="pseudo" >
		</div>
		<div class="input-group">
			<label>Mot de passe</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Connexion</button>
		</div>
		<!--<p>
			Pas encore enregistré? <a href="register.php">Enregistre-toi</a>
		</p>-->
	</form>


</body>
</html>