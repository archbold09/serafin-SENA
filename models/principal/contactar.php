<?php
require "../../conf/conexion.php";
/**
 * Modelo de tiempo
 */
class contacto extends Conexion {

	private $listado;

	function __construct() {
		parent::__construct();
	}

//Agregar
	public function agregarConsulta( $params ) {
		$sentencia = $this->ejecutarConParametros("INSERT INTO consultas ( detalle, nombre, correo, asunto, estado )
		 VALUES ( :detalle, :nombre, :correo, :asunto, 3 )",$params);
		return $sentencia;
	}
}
?>