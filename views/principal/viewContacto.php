<!DOCTYPE html>
<html lang="en">
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
  <title>SERAFIN - CONTACTAR</title>
</head>
<body class="bg-shape">

  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
            <a class="navbar-brand logo_h" href="../../index.php"><img class="img-fluid" src="../../assets/img/logo.png"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
                <li class="nav-item"><a class="nav-link" href="../../index.php">Inicio</a></li> 
                <!-- <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>  -->
            </ul>
            <div class="nav-right text-center text-lg-right py-4 py-lg-0">
                <a class="button" href="viewContacto.php">Contactar</a>
            </div>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->



  <!--================Hero Banner SM Area Start =================-->
  <section class="hero-banner-sm magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 0 100px">
    <div class="container">
      <div class="hero-banner-sm-content">
        <h1>Contacta con nosotros</h1>
        <p> Haz una consulta y soluciona tus dudas en el sector financiero. </p>
      </div>
    </div>
  </section>
  <!--================Hero Banner SM Area End =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Enviar una consulta</h2>
                </div>
                <div class="col-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                    </div>
                </div>
                <div class="col-lg-11">
                    <form class="form-contact contact_form" id="formCorreo">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label> Detalles </label>
                                    <textarea class="form-control w-100" name="detalle" id="detalle" cols="30" rows="9" placeholder="Digitar mensaje"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Nombre </label>
                                    <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Correo </label>
                                    <input class="form-control" name="correo" id="correo" type="email" placeholder="ejemplo@gmail.com" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label> Asunto </label>
                                    <input class="form-control" name="asunto" id="asunto" type="text" placeholder="Asunto" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="button" class="button button-contactForm" id="btnCorreo">Enviar mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	<!-- ================ contact section end ================= -->

    <!-- ================ start footer Area ================= -->
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
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | SERAFIN 
            </p>
            <!-- <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | SENA - SERAFIN 
            </p> -->
            <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="../../views/iniciarsesion/viewInicio.php"><i class="far fa-user"></i></a>
            </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->

    <script src="../../vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="../../vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../node_modules/toastr/build/toastr.min.js"></script>
    <!--Ajax Login-->
    <script>
        $(document).ready(function(){
        $.getScript( "../../assets/js/validaciones.js" );




        $("#btnCorreo").click(function() {
            var texta = textareaVal("formCorreo");
            var txt = txtVal("formCorreo");
            var email = valcorreo("formCorreo");
            var formData = new FormData( $("#formCorreo")[0] );
            formData.append("peticion","agregar");

            if ( texta && txt && email ) {
                $.ajax({
                    type : 'POST',
                    url : '../../controllers/principal/contactoControllers.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'JSON'
                    }).done(function(data){
                    if (data['exito']) {
                        $("#formCorreo")[0].reset();
                        alert_success(data['msj']);
                    } else {
                        alert_error(data['msj']);
                    }
            });
            }else{
                alert_warning("Por favor llene todos los campos");
            }

        });

        });
    </script>
</body>
</html>