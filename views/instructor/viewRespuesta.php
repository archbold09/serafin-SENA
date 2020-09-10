<?php
session_start();
include ('components/includes/verificarRol.php');
require "../../models/respuestaAprendiz.php";
$ra = new respuestaAprendiz();
$params = [
    ':idConsulta' => $_POST['idConsulta']
];
$item = $ra->consultaRespuestaAprendiz($params);
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
  <style>
  .centrarInput{
    text-align:center;
  }
  </style>
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
              <div class="card-body">
                <form id="formRespuesta" method="POST">
                  <div class="row">
                    <div class="col-md-4">
                      <input type="hidden" name="idConsulta" value="<?php echo $item[0]['id'] ?>">
                      <label> <b>Asunto</b></label>
                      <input type="text" class="form-control centrarInput" name="asunto" id="asunto" value="<?php echo utf8_decode($item[0]['asunto']) ?>" disabled>
                    </div>
                    <div class="col-md-4">
                      <label> <b>Correo</b></label>
                      <input type="text" class="form-control centrarInput" name="correo" id="correo" value="<?php echo utf8_decode($item[0]['correo']) ?>" disabled>
                    </div>
                    <div class="col-md-4">
                      <label> <b>Nombre</b></label>
                      <input type="text" class="form-control centrarInput" name="nombre" id="nombre" value="<?php echo utf8_decode($item[0]['nombre']) ?>" disabled>
                    </div>
                    <div class="col-md-12 mt-3">
                      <label> <b>Mensaje de consulta</b></label>
                      <textarea class="form-control centrarInput" name="mensaje" id="mensaje" cols="30" rows="10" style="text-align:center;" disabled><?php echo utf8_decode($item[0]['detalle']) ?></textarea>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <h5 class="card-title"> <b>Respuesta del aprendiz</b> </h5>
            <div class="card text-center">
              <div class="card-body">
                <form id="formRespuesta" method="POST">
                  <div class="row">
                    <div class="col-md-4">
                      <label> <b>Nombre Aprendiz</b></label>
                      <input type="text" class="form-control centrarInput" name="nombre" id="nombre" value="<?php echo utf8_decode($item[0]['nombreAprendiz'] ." ". $item[0]['apellidoAprendiz']) ?>" disabled>
                    </div>
                    <div class="col-md-12 mt-3">
                      <label> <b>Mensaje de respuesta</b></label>
                      <textarea class="form-control centrarInput" name="mensaje" id="mensaje" cols="30" rows="10" disabled><?php echo utf8_decode($item[0]['rMensaje']) ?></textarea>
                    </div>
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
  <script src="../../assets/js/instructor/consultas.js"></script>
</body>

</html>
