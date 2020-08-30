<?php
require "../../conf/conexion.php";
/**
 * Modelo de tiempo
 */
class respuestaAprendiz extends Conexion {

	private $listado;

	function __construct() {
		parent::__construct();
	}

//Listar
	public function listaRespuestaAprendiz() {
		$sentencia = $this->ejecutar("SELECT con.*, resp.mensaje AS rMensaje, us.nombre AS nombreAprendiz, us.apellido AS apellidoAprendiz
		FROM consultas AS con	
		INNER JOIN respuestas AS resp ON resp.idConsulta = con.id
		INNER JOIN consultasrespondidas AS conresp 
		INNER JOIN usuarios AS us ON us.id = conresp.idUsuario
		WHERE con.id = resp.idConsulta
		");
		$this->listado = $sentencia->fetchAll( PDO::FETCH_ASSOC );

		return $this->listado;
	}

//Consulta
	public function consultaRespuestaAprendiz( $params ) {
		$sentencia = $this->ejecutarConParametros("SELECT con.*, resp.mensaje AS rMensaje, us.nombre AS nombreAprendiz, us.apellido AS apellidoAprendiz
		FROM consultas AS con	
		INNER JOIN respuestas AS resp ON resp.idConsulta = con.id
		INNER JOIN consultasrespondidas AS conresp 
		INNER JOIN usuarios AS us ON us.id = conresp.idUsuario
		WHERE con.id = resp.idConsulta AND con.id = :idConsulta",$params);
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