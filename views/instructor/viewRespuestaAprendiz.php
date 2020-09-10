<?php
session_start();
include ('components/includes/verificarRol.php');
require "../../models/respuestaAprendiz.php";
$mc = new respuestaAprendiz();
$listaRespuestaAprendiz = $mc->listaRespuestaAprendiz();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- CSS styles -->  
  <?php include('../../assets/css/css.php') ?>
  <title>
    SERAFIN - RESPUESTA APRENDIZ
  </title>
</head>

<body>
  <div class="wrapper">

    <?php include('components/includes/sidebar.php') ?>

    <div class="main-panel">

    <?php include('components/includes/navbar.php') ?>

    <div class="content">
      <h6 class="card-title">Respuestas del aprendiz</h6>
      <div class="row">
        
        <?php foreach ($listaRespuestaAprendiz as $item) : ?>
          <div class="col-md-4">
            <div class="card text-center">
              <div class="card-body">
              <h6 class="card-title"> <b>Datos Consulta</b></h6>
                <h6 class="card-title"> <b>Asunto:</b> <?php echo $item['asunto'] ?> </h6>
                <p class="card-text"> <b>Pregunta:</b> <?php echo substr($item['detalle'], 0, 100); ?>...</p>
                <p class="card-text"> <b>Correo:</b> <?php echo $item['correo']; ?>...</p>
              </div>
              <hr>
              <div class="card-body">
                <p class="card-text"> <b>Respuesta:</b> <?php echo substr($item['rMensaje'], 0, 100); ?>...</p>
                <h6 class="card-title"> <b>Datos aprendiz</b></h6>           
                  <p class="card-text"> <b>Nombre:</b> <?php echo $item['nombreAprendiz'] ." ". $item['apellidoAprendiz'] ?> </p>
                <form action="viewRespuesta.php" method="POST">
                  <input type="text" name="idConsulta" value="<?php echo $item['id'] ?>" style="display:none;">
                  <button class="btn btn-success" type="submit">Ver respuesta</button>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>

    <?php include('components/includes/footer.php') ?>

    </div>
  </div>
  <?php include('../components/modals/cerrarsesion.php') ?>
  <!-- JS scripts -->
  <?php include('../../assets/js/js.php') ?>
  <script src="../../assets/js/instructor/respuestaAprendiz.js"></script>
</body>

</html>
