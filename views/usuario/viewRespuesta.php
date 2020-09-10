<?php
session_start();
include ('components/includes/verificarRol.php');
require "../../models/consultas.php";
$mc = new consulta();
$params = [
    ':idConsulta' => $_POST['idConsulta']
];
$item = $mc->listaConsultaRespuesta($params);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- CSS styles -->  
  <?php include('../../assets/css/css.php') ?>
  <link rel="stylesheet" href="../../node_modules/textarea/trumbowyg.min.css">
  <title>
    SERAFIN - RESPUESTA
  </title>
</head>

<body>
  <div class="wrapper">

    <?php include('components/includes/sidebar.php') ?>

    <div class="main-panel">

    <?php include('components/includes/navbar.php') ?>

    <div class="content">
      <div class="row">
        
          <div class="col-md-12">
            <h5 class="card-title"> <b>Datos de la consulta</b> </h5>
            <div class="card text-center">
              <div class="card-header"> <h6 class="card-title"> <b>Asunto:</b> <?php echo $item[0]['asunto'] ?> </h6> </div>
              <div class="card-body">
                <p class="card-text"> <b>Mensaje:</b> <?php echo $item[0]['detalle'] ?></p>
                <div class="card-footer">
                  <p class="card-text"> <b>Nombre:</b> <?php echo $item[0]['nombre'] ?> </p>
                  <p class="card-text"> <b>Correo:</b> <?php echo $item[0]['correo'] ?> </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <h5 class="card-title"> <b>Formulario de respuesta</b> </h5>
            <div class="card text-center">
              <div class="card-body">
                <form id="formRespuesta" method="POST">
                    <div class="row">
                      <div class="col-md-4">
                          <input type="hidden" name="idConsulta" value="<?php echo $item[0]['id'] ?>">
                          <label> <b>Asunto</b></label>
                          <input type="text" class="form-control" name="asunto" id="asunto" value="<?php echo $item[0]['asunto'] ?>">
                      </div>
                      <div class="col-md-4">
                          <label> <b>Correo</b></label>
                          <input type="text" class="form-control" name="correo" id="correo" value="<?php echo $item[0]['correo'] ?>">
                      </div>
                      <div class="col-md-4">
                          <label> <b>Nombre</b></label>
                          <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $item[0]['nombre'] ?>">
                      </div>
                      <div class="col-md-12 mt-3">
                          <label> <b>Mensaje de respuesta</b></label>
                          <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button id="btnRespuesta" type="button" class="btn btn-success">Enviar respuesta</button>
                    </div>
                </form>
              </div>
            </div>
          </div>

      </div>
    </div>

    <?php include('components/includes/footer.php') ?>

    </div>
  </div>
  <?php include('components/modals/modalUsuario.php') ?>
  <?php include('../components/modals/cerrarsesion.php') ?>
  <!-- JS scripts -->
  <?php include('../../assets/js/js.php') ?>
  <script src="../../assets/js/usuario/consultas.js"></script>
</body>

</html>
