<?php 
session_start();
// //Cierra la sesion
// if(isset($_GET['cerrar_sesion'])){
//   session_unset();
//   session_destroy();
// }
// //Verifica el rol
// if(isset($_SESSION['rol'])){
//   switch($_SESSION['rol']){
//     case 1:
//     header('location: views/administrador/viewinicio.php');
//     break;
//     case 2:
//     header('location: views/usuario/viewinicio.php');
//     break;
//     default:
//   }
// }
// require_once("../../models/mixtas.php");
// $mx = new ConsultasMixtas();
// $TDocumento = $mx->listarTD();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="../../assets/img/favicon.png" type="image/png">
  <link rel="stylesheet" href="../../vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../../vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../../vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/linericon/style.css">
  <link rel="stylesheet" href="../../vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="../../vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="../../vendors/flat-icon/font/flaticon.css">
  <link rel="stylesheet" href="../../vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="//cdn.materialdesignicons.com/4.5.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../../node_modules/toastr/build/toastr.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <title>SERAFIN - Iniciar Sesión</title>
</head>
<body>

  <section class="bg-gray section-padding magic-ball magic-ball-about">
    <div class="container">
      <div class="row">

        <div class="col-lg-7 col-md-6 mb-4 mb-md-0">
          <div class="about-img">
            <img class="img-fluid" src="../../assets/img/home/iniciosesion.png" alt="">
          </div>
        </div>

        <div class="col-lg-5 col-md-6 align-self-center about-content">
          <div class="container">
            <div class="row">
              <form id="formLogin" class="row">
                <div class="p-5">
                  <div class="text-center">
                    <img src="../../assets/img/logo.png" class="mb-3 img-fluid" alt="">
                    <p class="text-gray-900"> <b> SIMULADOR PARA EL APRENDIZAJE DE EDUCACIÓN FINANCIERA </b> </p>
                    <h1 class="h4 text-gray-900 mb-4">SENA - <b> SERAFIN </b> </h1>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <span class="mdi mdi-account"></span>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-user" name="numeroDocumento" id="numeroDocumento" placeholder="Número Documento" required>
                  </div>


                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <span class="mdi mdi-lock"></span>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-user" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                  </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block pb-10">Ingresar</button>
                  <hr>
                  <div class="text-center">
                    <a href="../../index.php" class="btn btn-outline-danger round"> Volver</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <footer class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <img src="../../assets/img/logo.png" class="img-fluid" width="400" alt="">
        </div>							
        <div class="col-lg-6 col-md-6 col-sm-6">
          <img src="../../assets/img/logosennova.png" class="img-fluid" width="400" alt="">
        </div>					
      </div>

      <div class="footer-bottom">
        <div class="row align-items-center">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | SENA - SERAFIN 
          </p>
          <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="views/iniciarsesion/viewInicio.php"><i class="far fa-user"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="../../vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="../../vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/main.js"></script>
  <script src="../../node_modules/toastr/build/toastr.min.js"></script>
    <!--Ajax Login-->
  <script>
    $(document).ready(function(){
      $.getScript( "../../assets/js/validaciones.js" );

      let frm_login = $("#formLogin");

      frm_login.on("submit",function(e){

        e.preventDefault();

        $.ajax({
          type : 'post',
          url : 'inicio_session.php',
          data : $("#formLogin").serialize(),
          dataType : 'json',
        }).done(function(data){
          if ( data.exito ) {
            toastr.clear();
            alert_success(data.msj);
            setTimeout(function() {
              window.location.href = data.href;
            }, 1000);
          } else {
            $('#numeroDocumento').css('border-style','solid');
            $('#numeroDocumento').css('border-color','red');
            $('#contrasena').css('border-style','solid');
            $('#contrasena').css('border-color','red');
            toastr.clear();
            alert_error(data.msj);
          }
        });
      });
    });
  </script>
</body>
</html>