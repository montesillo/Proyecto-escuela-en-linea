<!DOCTYPE html>
<html>
<head>
	<title>Escuela On Line</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos/estilo.css">

</head>
<body>
	<header>
		<?php setcookie('sesion',null, -1); ?>
			<div class="ancho">
			<nav>
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="#">Nosotros</a></li>
					<li><a href="#">Contacto</a></li>

				</ul>
			</nav>
		</div>

		
	</header>

	<div class="botones">
		<form action="registro.html" method="post">
			<input type="submit" value="Registrate">	
		</form>
		<form action="inicio.html" method="post">
			<input type="submit" value="Inicia Sesión">
		</form>
		
		
	</div>

</body>
</html>