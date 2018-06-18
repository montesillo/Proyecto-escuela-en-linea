<?php
	/**
	* 
	*/
	class Conexion extends MySQLi{
		private $conexion;
		public function __construct(){
			$this->conexion = mysqli_connect('localhost', 'root','', 'school');
		}
		public function Ejecutar($sql){
			$consulta = mysqli_query($this->conexion, $sql);
			return $consulta;
		}

		public function Desconectar(){
			$cerrar = mysqli_close($this->conexion);
		}
	}
?>