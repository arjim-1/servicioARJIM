<?php 
	require 'database.php'; 

	$message = '';

	if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
		$sql = "INSERT INTO users (usuario, password) VALUES (:usuario, :password)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':usuario', $_POST['usuario']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $password);

		if ($stmt->execute()) {
			$message = '¡Cuenta Creada Exitosamente!';
		}else{
			$message = 'Ups..., ocurrio un problema al crear su cuenta';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="assets/css/registro.css">
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
			<h1>Reg&iacute;strate</h1>
			<h2>Los mejores de la regi&oacute;n</h2>
		</section>
		<div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
	</header>

	<main>

		<?php if(!empty($message)): ?>
			<center> <p> <?= $message ?></p></center><br><br>
		<?php endif; ?>

		<h1 class="titulo">Reg&iacute;strate</h1>

		<section class="contenedor">
		<div class="formulario">
			<form action="signup.php" method="post"> 
				<div class="arriba">
					<input type="text" name="nombre" placeholder="Ingrese Su Nombre">
					<input type="text" name="apellido1" placeholder="Ingrese Su Apellido Paterno">
					<input type="text" name="apellido2" placeholder="Ingrese Su Apellido Materno">
					<input type="tel" name="telefono" placeholder="Ingrese Su Tel&eacute;fono">
					<input type="email" name="email" placeholder="Ingrese Su Correo electr&oacute;nico">
					<input type="usuario" name="usuario" placeholder="Ingrese Su Usuario"> 			<!- ->
					<input type="password" name="password" placeholder="Ingrese Su contraseña">		<!- ->
					<input type="password" name="confirm_password" placeholder="Confirme Su contraseña">
					<label>¿Acepta T&eacute;rminos Y Condiciones?<input type="radio" name="acepto"></label> 
				</div><center>
				<div class="abajo">
					<input type="reset" name="reset">
					<input type="submit" name="Send">												<!- ->
				</div>
			</form></center>
		</div>
		<p align="center">¿Ya tienes una cuenta? <a href="login.php">inicia sesi&oacute;n</a> aqu&iacute;.</p>
	</section>
	</main>

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