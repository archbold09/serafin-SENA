<?php
include_once 'config/conexion.php';
session_start();
//Variable de mensaje vacia
$msg = [
  "exito" => false,
  "href" => null,
  "msj" => null
];
//Autenticar un usuario
if(isset($_POST['numeroDocumento']) && isset($_POST['contrasena'])){
  $numeroDocumento = $_POST['numeroDocumento'];
  $clave = hash("sha256",utf8_encode($_POST[ 'contrasena' ]));
  
  $db = new Database();
  //Inicio de usuario y administrador
  $query = $db->connect()->prepare('SELECT * FROM usuarios 
  WHERE numeroDocumento = :numeroDocumento AND contrasena = :clave AND estado = 3');
  $query->execute(['numeroDocumento' => $numeroDocumento, 'clave' => $clave]);
  
  $row = $query->fetch(PDO::FETCH_NUM);
 
  if( $row == true ){
    //validar rol
    $rol = $row[6];
    $_SESSION['rol'] = $rol;
    $_SESSION['usuario'] = [
      "id" => $row[0],
      "nombre" => strtoupper($row[1]." ".$row[2])
    ];
    
    switch( $_SESSION['rol'] ){
      case 1:
        $msg = [
          "exito" => true,
          "href" => "../administrador/viewInicio.php",
          "msj" => "Bienvenido Administrador"
        ];
      break;

      case 2:
        $msg = [
          "exito" => true,
          "href" => "../usuario/viewInicio.php",
          "msj" => "Bienvenido"
        ];
      break;

      case 3:
        $msg = [
          "exito" => true,
          "href" => "../instructor/viewInicio.php",
          "msj" => "Bienvenido"
        ];
      break;

      default:
    }
  } else {
    $msg = [
      "exito" => false,
      "href" => null,
      "msj" => "¡El usuario o contraseña son incorrectos!"
    ];
  }
} else {
  $msg = [
    "exito" => false,
    "href" => null,
    "msj" => "¡El usuario o contraseña son incorrectos!"
  ];
  
}

echo json_encode($msg);
?>