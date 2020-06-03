<?php
	session_start(); 

	require 'database.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id, usuario, password FROM users WHERE id = :id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results; 	
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<header>
		<nav>
			<a href="index.php">Inicio</a>
			<a href="login.php">Inicio de sesi&oacute;n</a>
			<a href="signup.php">Registro</a>
		</nav>
		<section class="textos-header">
			<h1>Inicia sesi&oacute;n o reg&iacute;strate</h1>
			<h2>Los mejores de la regi&oacute;n</h2>
		</section>
		<div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
	</header>

	

	<section class="contenedor">
		<center>

			<?php if(!empty($user)): ?>
				<br>Bienvenido. <?= $user['usuario']; ?>
				<br>Estas satisfactoriamente registrado
				<a href="logout.php">Salir</a>

			<?php else: ?>


			<h1 class="titulo">Entra Al Mejor Taller De Hojalater&iacute;a, Pintura Y Restauraci&oacute;n De la Regi&oacute;n.</h1>

			<p><a href="login.php">Inicia Sesi&oacute;n</a> Si aun no cuentas con una cuenta <a href="signup.php">Reg&iacute;strate.</a></p><br><br><br>
			
			<p>Somos una empresa responsable, dando catedra a nuestra competencia por m&aacute;s de 30 a&ntilde;os siempre ofreciendo el mejor servicio, calidad, trato y resultados, somos la mejor opci&oacute;n para ti y tu auto.</p>

			<?php endif; ?>
		</center>
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