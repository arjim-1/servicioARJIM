<?php  

	session_start();

	require 'database.php';

	if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
		$records = $conn->prepare('SELECT id, usuario, password FROM users WHERE usuario=:usuario');
		$records->bindParam(':usuario', $_POST['usuario']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
			$_SESSION['user_id'] = $results['id'];
			header('Location: /php-login');
		}else{
			$message = 'Sorry, Those credentials do not match';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicair Sesi&oacute;n</title>
	<link rel="stylesheet" type="text/css" href="assets/css/iniciar.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>



	<header>
		<nav>
			<a href="index.php">Inicio</a>
			<a href="login.php">Inicio de sesi&oacute;n</a>
			<a href="signup.php">Registro</a>
		</nav>
		<section class="textos-header">
			<h1>Inicia sesi&oacute;n</h1>
			<h2>Los mejores de la regi&oacute;n</h2>
		</section>
		<div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
	</header>

	<?php if(!empty($message)) : ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1 class="titulo">Inicia Sesi&oacute;n</h1>

	<section class="contenedor">
		<div class="formulario">
			<form action="inicio.html" method="post"> 
				<div class="arriba">
					<input type="usuario" name="usuario" placeholder="Ingrese Su Usuario"> 			<!- ->
					<input type="password" name="password" placeholder="Ingrese Su contraseña">		<!- ->
					<label>¿Acepta T&eacute;rminos Y Condiciones?<input type="radio" name="acepto"></label> 
				</div><center>
				<div class="abajo">
					<input type="reset" name="reset">
					<input type="submit" name="Send">												<!- ->
				</div>
			</form></center>
		</div>
		<p align="center">¿A&uacute;n no tienes una cuenta? <a href="signup.php">reg&iacute;strate</a> aqu&iacute;.</p>
	</section>


	<footer>
		<div class="contenedor-footer">
			<div class="content-foo">
				<h4>Numero</h4>
				<p>7425846838</p>
			</div>

			<div class="content-foo">
				<h4>Email</h4>
				<p>serviciosarjim.@gmail.com</p>
			</div>
			<div class="content-foo">
				<h4>Localizaci&oacute;n</h4>
				<p>Tepeaca, Pue.</p>
			</div>
			<div class="content-foo">
				<h4>Twitter</i></h4>
				<p>Servicio de Hojalater&iacute;a ARJIM.</p>
			</div>
			<div class="content-foo">
				<h4>Facebook</i></h4>
				<p>Servicio de Hojalater&iacute;a ARJIM.</p>
			</div>
			<div class="content-foo">
				<h4>Instagram</i></h4>
				<p>Servicio de Hojalater&iacute;a ARJIM.</p>
			</div>
		</div>
		<h2 class="titulo-final">Taller &copy;ARJIM SA de CV</h2>
	</footer>

</body>
</html>