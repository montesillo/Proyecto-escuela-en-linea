
<?php 
include('consulta.php');
if (isset($_POST['enviar'])) {
	if ($_POST['rol']=="profesor") {
		$consulta = "insert into maestros(nombre, a_paterno, a_materno, correo, password) values('$_POST[nombre]', '$_POST[apaterno]', '$_POST[amaterno]', '$_POST[email]', '$_POST[password]')";
		$base = new Acceso($consulta);
		$base->InsertarSQL();
	}
	if ($_POST['rol'] == "alumno") {
	echo 'alumno';
	$consulta = "insert into alumnos(nombre, a_paterno, a_materno, correo, password) values('$_POST[nombre]', '$_POST[apaterno]', '$_POST[amaterno]', '$_POST[email]', '$_POST[password]')";
		$base = new Acceso($consulta);
		$base->InsertarSQL();
	}
	
}
	echo "<script type=text/javascript>alert('Registro Correcto');</script>";
	header('location: registro.html');

 ?>