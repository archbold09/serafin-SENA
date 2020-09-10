<?php
session_start();
include ('components/includes/verificarRol.php');
require "../../models/mixtas.php";
$mixta = new ConsultasMixtas();
$listarTotalConsulta = $mixta->listarTotalConsulta();
$listarConsultasPorResponder = $mixta->listarConsultasPorResponder();
$listarConsultasRespondidas = $mixta->listarConsultasRespondidas();
$totalConsultas = sizeof($listarTotalConsulta);
$listarConsultasPorResponder = sizeof($listarConsultasPorResponder);
$listarConsultasRespondidas = sizeof($listarConsultasRespondidas);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- CSS styles -->  
  <?php include('../../assets/css/css.php') ?>
  <title>
    SERAFIN - INICIO
  </title>
</head>

<body>
  <div class="wrapper">

    <?php include('components/includes/sidebar.php') ?>

    <div class="main-panel">

    <?php include('components/includes/navbar.php') ?>

    <div class="content">
      <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-vector text-danger"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Total de consultas del sistema</p>
                    <p class="card-title"><?php echo $totalConsultas; ?><p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-vector text-danger"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Consultas por responder</p>
                    <p class="card-title"><?php echo $listarConsultasPorResponder; ?><p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-vector text-danger"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Consultas respondidas</p>
                    <p class="card-title"><?php echo $listarConsultasRespondidas; ?><p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>

    </div>

      <?php include('../components/modals/cerrarsesion.php') ?>
      <?php include('components/includes/footer.php') ?>

    </div>
  </div>
  <!-- JS scripts -->
  <?php include('../../assets/js/js.php') ?>

  <script>
  //Funcion anonima
  $(function() {
    //Aqui se configura el URL
    let archivo = "viewInicio.php";
    let pathname = window.location.pathname;
    let array = pathname.split("/");
    let archivo2 = array.pop();

    if (archivo == archivo2) {
      $("li.inicio").addClass('active');
    }
  });
  </script>
</body>

</html>
