

<?php

session_start();
if (isset($_POST['inicio'])) {
	$_SESSION['email']= $_POST['email'];
	$_SESSION['pass']= $_POST['pass'];
	$consulta = "select * from maestros where correo= '$_POST[email]'";

include('consulta.php');
	$base = new Acceso($consulta);
	$base->UsuariosSQL();
}
	?>