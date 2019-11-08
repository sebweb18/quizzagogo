<!--<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Enregistrement</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Pseudo</label>
			<input type="text" name="Pseudo" value="<?php echo $pseudo; ?>">
		</div>

		<div class="input-group">
			<label>Prénom</label>
			<input type="text" name="Prénom" value="<?php echo $prenom; ?>">
		</div>

		<div class="input-group">
			<label>Mot de passe</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirmez le mot de passe</label>
			<input type="password" name="password_2">
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Valider</button>
		</div>
		<p>
			Déja membre? <a href="login.php">Connectez-vous</a>
		</p>
	</form>
</body>
</html>
-->