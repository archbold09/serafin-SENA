<?php
session_start();
include ('components/includes/verificarRol.php');
require "../../models/consultas.php";
$mc = new consulta();
$listarConsultas = $mc->listaConsulta();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- CSS styles -->  
  <?php include('../../assets/css/css.php') ?>
  <title>
    SERAFIN - CONSULTAS
  </title>
</head>

<body>
  <div class="wrapper">

    <?php include('components/includes/sidebar.php') ?>

    <div class="main-panel">

    <?php include('components/includes/navbar.php') ?>

    <div class="content">
      <h6 class="card-title">Consultas</h6>
      <div class="row">
        
        <?php foreach ($listarConsultas as $item) : ?>
          <div class="col-md-4">
            <div class="card text-center">
              <div class="card-header">
                <?php 
                  $estado = '';
                  switch ($item['estado']) {
                    case '3':
                      $estado = 'Activo';
                    break;
                    case '4':
                      $estado = 'Inactivo';
                    break;
                    case '5':
                      $estado = 'Respondido';
                    break;
                    default:
                    break;
                  } 
                ?>
                <div class="alert alert-success" role="alert">
                  <b> <?php echo $estado ?> </b>  
                </div>
              </div>
              <div class="card-body">
                <h6 class="card-title"> <b>Asunto:</b> <?php echo $item['asunto'] ?> </h6>
                <p class="card-text"> <b>Mensaje:</b> <?php echo substr($item['detalle'], 0, 100); ?>...</p>
                <div class="card-footer">
                  <p class="card-text"> <b>Nombre:</b> <?php echo $item['nombre'] ?> </p>
                  <p class="card-text"> <b>Correo:</b> <?php echo $item['correo'] ?> </p>
                </div>
                <form action="viewRespuesta.php" method="POST">
                  <input type="text" name="idConsulta" value="<?php echo $item['id'] ?>" style="display:none;">

                  <?php if( $estado == 'Activo' ): ?>
                    <button class="btn btn-success" type="submit">Responder consulta</button>
                  <?php elseif( $estado == 'Inactivo' ):?>
                    <button class="btn btn-success" type="submit" disabled>Consulta inactiva</button>

                  <?php elseif( $estado == 'Respondido' ): ?>
                    <button class="btn btn-success" type="submit" disabled>Consulta respondida</button>
                  
                  <?php endif;?>

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
  <script src="../../assets/js/usuario/consultas.js"></script>
</body>

</html>
