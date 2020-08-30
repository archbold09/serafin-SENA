<?php
require "../conf/conexion.php";
/**
 * Modelo de tiempo
 */
class respuesta extends Conexion {

	private $listado;

	function __construct() {
		parent::__construct();
	}

//Listar
	public function listaConsulta() {
		$sentencia = $this->ejecutar("SELECT con.*
		FROM consultas AS con
		WHERE con.estado = 3
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
	public function agregarRespuesta( $params ) {
		$sentencia = $this->ejecutarConParametros("INSERT INTO respuestas ( asunto, correo, nombre, mensaje, idConsulta )
		 VALUES ( :asunto, :correo, :nombre, :mensaje, :idConsulta )",$params);
		return $sentencia;
	}

	public function agregarRespuestaConsulta( $params ) {
		$sentencia = $this->ejecutarConParametros("INSERT INTO consultasrespondidas ( idUsuario, idConsulta )
		 VALUES ( :idUsuario, :idConsulta )",$params);
		return $sentencia;
	}


//Actualizar
	public function actualizarConsulta( $params ) {
		$sentencia = $this->ejecutarConParametros("UPDATE consultas SET estado = 5
		WHERE id = :idConsulta ",$params);
		return $sentencia;
	}

//Eliminar
	public function eliminarUsuario( $params ) {
		$sentencia = $this->ejecutarConParametros("UPDATE usuarios SET estado = 4 WHERE id = :id",$params);
		return $sentencia;
	}
}
?>