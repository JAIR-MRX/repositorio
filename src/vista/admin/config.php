<?php
require("../../modelo/conexion.php");
require("../../controlador/configuracion/constantes.php");
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="shortcut icon" href="https://www.humanidades.unach.mx/images/descarga.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Repositorio de Posgrado Facultad de Humanidades C-VI</title>
</head>

<body>

<nav class="d-flex flex-wrap px-5 py-1 mb-4" style="background-color: #D2A92D;">
  <div class="container-fluid">
      <img class="img-fluid" src="../../controlador/configuracion/img/<?php echo BANNER_POSGRADO; ?>" width="670" height="425" alt="Banner epcle" class="d-inline-block align-text-top ">
  </div>
</nav>
<div>
<nav class="navbar navbar-expand-lg d-flex flex-wrap py-1" style="background-color: #18386B; margin-top: -25px">
  <div class="container-fluid">
    <button class="navbar-toggler" style="border-color: white; color:white;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="home.php">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">ARCHIVOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"aria-current="page" href="config.php">CONFIGURACION</a>
        </li>
      </ul>
      <form class="d-flex" role="search"  id="search-form" action="index.php">
        <input class="form-control me-2" type="text" name="search" id="inputBusqueda" value="" placeholder="Buscar" aria-label="Search">
        <button class="btn fa fa-search text-light" type="submit"></button>
      </form>
    </div>
  </div>
</nav>
</div>

<form action="../../controlador/configuracion/config.php" method="post" enctype="multipart/form-data">
<p class=" mx-5 mt-5 btn btn-modal" >
            Banner de las paginas
</p>
<div class="row px-5">



        <div class="col-12 col-md-3 text-center">
            <img id="avatar1" 
                 src="../../controlador/configuracion/img/<?php echo BANNER_POSGRADO; ?>" 
                 class="img-thumbnail" 
                 alt="Banner del Repositorio de Posgrado"
                 style="width: 578px; height: 80px;">
                 
            <h5 class="mt-3">Banner del Repositorio de Posgrado</h5>
            <input type="file" class="form-control mt-2 file-upload1" 
                   id="form3Example2" name="bannerposgrado">
        </div>


        <div class=" col-12 col-md-3 text-center">
            <img id="avatar2" 
                 src="../../controlador/configuracion/img/<?php echo BANNER_ESPECIALIDAD; ?>" 
                 class="img-thumbnail" 
                 alt="Banner Especialidad"
                 style="width: 584px; height: 80px;">
                 
            <h5 class="mt-3">Banner Especialidad</h5>
            <input type="file" class="form-control mt-2 file-upload2" 
                   id="form3Example2" name="bannerepcle">
        </div>

        <div class=" col-12 col-md-3 text-center">
            <img id="avatar3" 
                 src="../../controlador/configuracion/img/<?php echo BANNER_MAESTRIA; ?>" 
                 class="img-thumbnail" 
                 alt="Banner Maestria"
                 style="width: 584px; height: 80px;">
                 
            <h5 class="mt-3">Banner Maestria</h5>
            <input type="file" class="form-control mt-2 file-upload3" 
                   id="form3Example2" name="bannermecc">
        </div>

        <div class=" col-12 col-md-3 text-center">
            <img id="avatar4" 
                 src="../../controlador/configuracion/img/<?php echo BANNER_DOCTORADO; ?>" 
                 class="img-thumbnail" 
                 alt="Banner Doctorado"
                 style="width: 584px; height: 80px;">
                 
            <h5 class="mt-3">Banner Doctorado</h5>
            <input type="file" class="form-control mt-2 file-upload4" 
                   id="form3Example2" name="bannerder">
        </div>

</div>

<p class="btn btn-modal mx-5 mt-5">
            Logos
        </p>
<div class="row px-5 justify-content-center">

        <div class="col-12 col-md-3 text-center">
            <img id="avatar5" 
                 src="../../controlador/configuracion/img/<?php echo LOGO_ESPECIALIDAD; ?>" 
                 class="img-thumbnail" 
                 alt="Logo Especialidad"
                 style="width: 150px; height: 150px;">
                 
            <h5 class="mt-3">Logo Especialidad</h5>
            <input type="file" class="form-control mt-2 file-upload5" 
                   id="form3Example2" name="logoepcle">
        </div>


        <div class=" col-12 col-md-3 text-center">
            <img id="avatar6" 
                 src="../../controlador/configuracion/img/<?php echo LOGO_MAESTRIA; ?>" 
                 class="img-thumbnail" 
                 alt="Logo Maestria"
                 style="width: 150px; height: 150px;">
                 
            <h5 class="mt-3">Logo Maestria</h5>
            <input type="file" class="form-control mt-2 file-upload6" 
                   id="form3Example2" name="logomecc">
        </div>

        <div class=" col-12 col-md-3 text-center">
            <img id="avatar7" 
                 src="../../controlador/configuracion/img/<?php echo LOGO_DOCTORADO; ?>" 
                 class="img-thumbnail" 
                 alt="Logo Doctorado"
                 style="width: 150px; height: 150px;">
                 
            <h5 class="mt-3">Logo Doctorado</h5>
            <input type="file" class="form-control mt-2 file-upload7" 
                   id="form3Example2" name="logoder">
        </div>
        
</div>
<div class="d-flex justify-content-center" style="width: 100%;">
    <button type="submit" class="col-auto btn buscar mt-5">Guardar Cambios</button>
</div>

</form>

<hr/>

<div class="instituciones px-1" style="overflow: hidden; max-width: 75rem; margin: 1.25rem auto;">
    <div class="contenedor ">
        <ul class="row">
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.cumex.org.mx/" target="_blank"><img src="../../img/conv_1.png" alt="CUMEX"></a></li>
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.virtualeduca.org/" target="_blank"><img src="../../img/conv_3.png" alt="Virtual educa"></a></li>
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.anuies.mx/" target="_blank"><img src="../../img/conv_10.png" alt="anuies"></a></li>
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.copaes.org/" target="_blank"><img src="../../img/conv_8.png" alt="COPAES"></a></li>
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.ciees.edu.mx/" target="_blank"><img src="../../img/conv_9.png" alt="CIEES"></a></li>
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.contraloriasocial.unach.mx/" target="_blank"><img src="../../img/contraloria_social.jpg" alt="Contraloria social"></a></li>
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.cudi.mx/" target="_blank"><img src="../../img/conv_6.png" alt="CUDI"></a></li>
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.ecoesad.org.mx/" target="_blank"><img src="../../img/conv_5.png" alt="ECOESAD"></a></li>
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.sined.mx/sined/" target="_blank"><img src="../../img/conv_2.png" alt="SINED"></a></li>
            <li class="col-4 col-sm-2  col-lg-1"><a href="http://educontinua-amecyd.com/" target="_blank"><img src="../../img/amecyd.png" alt="AMECYD"></a></li>
        </ul>
    </div>
</div>

<?php
    include("../footer.php");
?>
</body>
<script src="../../../bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload1").on('change', function(){
        readURL(this);
    });
});
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload2").on('change', function(){
        readURL(this);
    });
});
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar3').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload3").on('change', function(){
        readURL(this);
    });
});
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar4').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload4").on('change', function(){
        readURL(this);
    });
});

$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar5').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload5").on('change', function(){
        readURL(this);
    });
});
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar6').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload6").on('change', function(){
        readURL(this);
    });
});
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar7').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload7").on('change', function(){
        readURL(this);
    });
});
</script>
</html>
