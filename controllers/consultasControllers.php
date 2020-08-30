<?php
date_default_timezone_set('America/Bogota');
setLocale(LC_ALL, "es_CO");

require_once "../models/consultas.php";

class consultaControllers extends consulta {

  public function __construct() {
    parent::__construct();
  }

  public function parse( $text ){
    $parsedText = str_replace(chr(10), "", $text);
    return str_replace(chr(13), "", $parsedText);
  }
}

if( isset($_POST["peticion"]) ) {
  $peticion = $_POST["peticion"];
  $us = new consultaControllers();

  $respuesta = [
    "exito" => false,
    "msj" => "Hubo un error al procesar la petición"
  ];

  switch($peticion) {
  //AGREGAR--------------
    case 'responder':
      $params = [
        ':asunto' => utf8_encode($_POST['asunto']),
        ':correo' => utf8_encode($_POST['correo']),
        ':nombre' => utf8_encode($_POST['nombre']),
        ':mensaje' => utf8_encode($_POST['mensaje']),
      ];
  

      if ($mensaje) {
        $respuesta = [
          "exito" => true,
          "msj" => "Respuesta enviada correctamente"
        ];
      } else {
        $respuesta = [
          "exito" => false,
          "msj" => "Falla al enviar respuesta"
        ];
      }

      echo json_encode( $respuesta );
    break;

    default:
      # code...
    break;
  }
}