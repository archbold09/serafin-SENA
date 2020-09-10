<?php
session_start();
date_default_timezone_set('America/Bogota');
setLocale(LC_ALL, "es_CO");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once "../models/respuestas.php";

require '../vendors/phpMailer/PHPMailer.php';
require '../vendors/phpMailer/Exception.php';
require '../vendors/phpMailer/SMTP.php';

class respuestaControllers extends respuesta {

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
  $us = new respuestaControllers();

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
        ':idConsulta' => utf8_encode($_POST['idConsulta'])
      ];

      $sqlGuardar = $us->agregarRespuesta($params);

      if ( $sqlGuardar ) {

        $paramsRespuesta = [
          ':idUsuario' => $_SESSION['usuario']['id'],
          ':idConsulta' => $_POST['idConsulta'],
        ];
        $paramConsulta = [ 
          ':idConsulta' => $_POST['idConsulta'],
        ];

        $agregarRespuestaConsulta = $us->agregarRespuestaConsulta($paramsRespuesta);
        $actualizarConsulta = $us->actualizarConsulta($paramConsulta);

        $correo = $params[':correo'];
        $asunto = $params[':asunto'];
        $mensaje = $params[':mensaje'];
        $nombre = $params[':nombre'];

        $contenido="Nombre: ".$nombre."\nCorreo: ".$correo."\nMensaje: ".$mensaje;

        $mail = @mail($correo,"Contacto", $contenido);

        if ( $mail ) {
          $respuesta = [
            "exito" => true,
            "msj" => "Respuesta enviada correctamente"
          ];
        }else{
          $respuesta = [
            "exito" => false,
            "msj" => "Falla al enviar respuesta"
          ];
        }

      }else{
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