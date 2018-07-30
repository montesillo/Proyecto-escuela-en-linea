<?php
	include('conexion.php');
	/**
	* 
	*/
	class Acceso{
		private $consulta;
		private $sql;
		private $abrir;
		private $cerrar;

		public function __construct($c){
			$this->consulta = $c;
		}
		#Mando el codigo sql a consulta.php
		public function Consulta(){
			$db = new Conexion();
			$this->sql = $db->Ejecutar($this->consulta);
			$this->cerrar = $db->Desconectar();
		}
		#En este se puede usar tanto para insertar registros como para borrar
		#Solo envio el codigo sql que necesite utilizar
		public function InsertarSQL(){
			$this->Consulta();
			echo 'Registro Incertado';
			return $this->cerrar;
		}
		public function ListadoSQL(){
			$this->Consulta();
			while ($reg = mysqli_fetch_array($this->sql)) {
				#Aqui ponglo lo que quiero imprimir en pantalla
				#Tambien puedo obtener datos espesificos de la db
			}

		}
		public function UsuariosSQL(){
				
				$correo = '';
				$pass = '';
				$nom = '';
			$this->Consulta();

			while ($reg = mysqli_fetch_array($this->sql)) {
				$correo = $reg['correo'];
				$pass = $reg['password'];
				$nom = $reg['nombre'];
				$maes = $reg['id_maestros'];
				
			}

			if ($correo == $_SESSION['email'] and $pass == $_SESSION['pass'] ) {
				setcookie("sesion", $maes, time()+3600);
				header('location: principal.php');

				
			}else{
				header('location: inicio.html');
				echo '<script>alert("Correo o Contraseña incorrectas");';
				setcookie('sesion',null, -1);

			}
			return $this->cerrar;

		}

		public function MateriasSQL(){
			$this->Consulta();
			while ($reg = mysqli_fetch_array($this->sql)) {
				$_SESSION['id_materia'] = $reg['id_materia'];
			}
			return $this->cerrar;
		}


	}
?>