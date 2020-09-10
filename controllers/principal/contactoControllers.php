<?php
date_default_timezone_set('America/Bogota');
setLocale(LC_ALL, "es_CO");

require_once "../../models/principal/contactar.php";

class contactoControllers extends contacto {

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
  $us = new contactoControllers();

  $respuesta = [
    "exito" => false,
    "msj" => "Hubo un error al procesar la petición"
  ];

  switch($peticion) {
  //AGREGAR--------------
    case 'agregar':
      $params = [
        ":detalle" => utf8_encode( $_POST['detalle'] ),
        ":nombre" => strtoupper( $_POST['nombre'] ),
        ":correo" => strtoupper( $_POST['correo'] ),
        ":asunto" => strtoupper( $_POST['asunto'] ),
      ];

      $sqlGuardar = $us->agregarConsulta( $params );

      if ( $sqlGuardar ) {
        $respuesta = [
          "exito" => true,
          "msj" => "Consulta enviada correctamente"
        ];
      } else {
        $respuesta = [
          "exito" => false,
          "msj" => "Falla al enviar la consulta"
        ];
      }

      echo json_encode( $respuesta );
    break;

    default:
      # code...
    break;
  }
}