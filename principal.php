<?php 
if (empty($_COOKIE['sesion'])) {
		header('location: inicio.html');
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Escuela On Line</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos/estilo.css">
	<script type="text/javascript">
				function estilos(){
					
					document.getElementById("botonesPrincipales").style.display= "none";
					document.getElementById("regresar").style.display= "block";

				}	
					function ocultar(){
					document.getElementById("nivel").style.display= "none";
					document.getElementById("registroMaterias").style.display= "none";
					document.getElementById("regresar").style.display= "none";
					document.getElementById("explicaciones").style.display= "none";
					document.getElementById("nivel").style.display= "none";
					}
			</script>
</head>
<body>
	<header>
			<div class="ancho">
				<nav>
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="#">Nosotros</a></li>
					<li><a href="#">Contacto</a></li>

				</ul>
			</nav>
		</div>
		<form method="POST" action="inicio.php">
			<select name="grado" style="display: none" id="nivel">
				<option value="0">Elije una opción</option>
				<optgroup label="Primaria">
					<option value="1">1°</option>
					<option value="2">2°</option>
					<option value="3">3°</option>
					<option value="4">4°</option>
					<option value="5">5°</option>
					<option value="6">6°</option>
				</optgroup>
				<optgroup label="Secundaria">
					<option value="7">1°</option>
					<option value="8">2°</option>
					<option value="9">3°</option>
				</optgroup>
			</select>
								
			<div id="botonesPrincipales">
				<p><input type="submit" name="materias"  value="Registrar Materias" ><br><br></p>
				<input type="submit" name="ejercicios" value="Registrar Ejercicios"><br><br>
				<input type="submit" name="ejemplos" value="Registrar Ejemplos"><br><br>
				<input type="submit" name="examen" value="Registrar Examen"><br><br>
			</div>
			<div id="explicaciones" style="display: none">
				<p>Coloca la url de tú video: <input type="url" name="url" size="40"></p><br><br>
				
				<p>Coloca una explicación sobre el tema: </p>
				<p><textarea rows="10" cols="60" name="tema"></textarea></p>
			</div>
			<div id="registroMaterias" style="display: none;">
				<p>Nombre de la materia: <input type="text" name="mat"></p>
				<p></p>	
			</div>
			<div id="registroEjercicios" style="display: none;">
				<p></p>
			</div>
				
			<div id="regresar" style="display: none">

			
				<p><input type="submit" name="regresar"  value="Regresar"><br><br></p>
			</div>

			

			<?php 
				if (isset($_POST['materias'])) {
					echo '<script type="text/javascript">
					estilos();
					document.getElementById("nivel").style.display= "block";
					document.getElementById("registroMaterias").style.display= "block";

					
					</script>';
					 echo '<input type=submit name=materiasEnviar value=Guardar >';
					
				}
				if (isset($_POST['ejercicios'])) {
					echo '<script type="text/javascript">
					estilos();
					</script>';
				}
				if (isset($_POST['ejemplos'])) {

					
					echo '<script type="text/javascript">
					estilos();
					document.getElementById("explicaciones").style.display= "block";

					</script>';
					 echo '<input type=submit name=ejemploEnviar value=Guardar >';
					
				}
				if (isset($_POST['examen'])) {

					echo '<script type="text/javascript">
					estilos();
					</script>';
					
				}
				if (isset($_POST['regresar'])) {
					echo '<script type="text/javascript">
					ocultar();
					</script>';
					
				}
				if (isset($_POST['ejemploEnviar'])) {
					$consulta = "insert into explicaciones(url, explicacion) values ('$_POST[url]', '$_POST[tema]')";
					include('consulta.php');
					$base = new Acceso($consulta);
					$base->InsertarSQL();
					
					
				}

					if (isset($_POST['materiasEnviar'])) {
					$consulta = "insert into materias(materia) values ('$_POST[mat]')";
					include('consulta.php');
					$base = new Acceso($consulta);
					$base->InsertarSQL();

					$consulta = "select * from materias where materia = '$_POST[mat]'";
					$base = new Acceso($consulta);
					$base->MateriasSQL();
					
					if (isset($_POST['grado'])) {
						$grado = $_POST['grado'];
						if ($grado <=6 ) {
							$nivel = 'Primaria';
						}else{
							$nivel = 'Secundaria';
						}

						$id_maestro = $_COOKIE['sesion'];
						$id_materia = $_SESSION['id_materia'];

						$consulta = "insert into niveles(grado, nivel, id_materia, id_maestro) values ('$grado', '$nivel', '$id_materia', '$id_maestro')";
						$base = new Acceso($consulta);
						$base->InsertarSQL();
						
					}
					
				}
			
			 ?>
			
		</form>

		
	</header>
</body>
</html>
