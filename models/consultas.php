<?php
require "../../conf/conexion.php";
/**
 * Modelo de tiempo
 */
class consulta extends Conexion {

	private $listado;

	function __construct() {
		parent::__construct();
	}

//Listar
	public function listaConsulta() {
		$sentencia = $this->ejecutar("SELECT con.*
		FROM consultas AS con
		");
		$this->listado = $sentencia->fetchAll( PDO::FETCH_ASSOC );

		return $this->listado;
	}

	public function listaConsultaRespuesta( $params ) {
		$sentencia = $this->ejecutarConParametros("SELECT con.*
		FROM consultas AS con
		WHERE con.id = :idConsulta
		LIMIT 0,1
		",$params);
		$this->listado = $sentencia->fetchAll( PDO::FETCH_ASSOC );

		return $this->listado;
	}

//Consulta
	public function consultarUsuario( $params ) {
		$sentencia = $this->ejecutarConParametros("SELECT * FROM usuarios WHERE id = :id",$params);
		$this->listado = $sentencia->fetchAll( PDO::FETCH_ASSOC );
		return $this->listado;
	}

//Agregar
	public function agregarUsuario( $params ) {
		$sentencia = $this->ejecutarConParametros("INSERT INTO usuarios ( nombre, apellido, tipoDocumento, numeroDocumento, contrasena, rolUsuario, estado )
		 VALUES ( :nombre, :apellido, :tipoDocumento, :numeroDocumento, :contrasena, :rolUsuario, 3  )",$params);
		return $sentencia;
	}

//Actualizar
	public function actualizarUsuario( $params ) {
		$sentencia = $this->ejecutarConParametros("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, tipoDocumento = :tipoDocumento, numeroDocumento = :numeroDocumento, rolUsuario = :rolUsuario
		WHERE id = :id",$params);
		return $sentencia;
	}

//Eliminar
	public function eliminarUsuario( $params ) {
		$sentencia = $this->ejecutarConParametros("UPDATE usuarios SET estado = 4 WHERE id = :id",$params);
		return $sentencia;
	}
}
?>