<?php
require("src/modelo/conexion.php");
require("src/controlador/configuracion/constantes.php");

?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="https://www.humanidades.unach.mx/images/descarga.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Repositorio de Posgrado Facultad de Humanidades C-VI</title>

</head>

<body>

    <?php
        include("src/vista/header.php");
    ?>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <div class="col d-flex justify-content-center ">
                <div class="card card-custom hover-zoom">
                <a href="src/vista/repoEPCLE.php" ><img  src="src/controlador/configuracion/img/<?php echo LOGO_ESPECIALIDAD; ?>" class="card-img-top" alt="EPCLE"/> </a>
                    <div class="card-body">
                    <h5 class="card-title">Especialidad en Procesos Culturales y Lecto-Escritores</h5>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card card-custom">
                    <a href="#" ><img  src="src/controlador/configuracion/img/<?php echo LOGO_MAESTRIA; ?>" alt="MEC"/></a>
                    <div class="card-body">
                    <h5 class="card-title">Maestria en Estudios Culturales</h5>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card card-custom">
                <a href="#" > <img  src="src/controlador/configuracion/img/<?php echo LOGO_DOCTORADO; ?>" class="card-img-top" alt="DER"/></a>
                    <div class="card-body">
                    <h5 class="card-title">Doctorado en Estudios Regionales</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div><br>
        <h3 style="text-align: center; font-size: 24px" >
            Acerca de este Repositorio.
        </h3>
        <p class="texto1"><strong><b>
        Este repositorio de tesinas es una plataforma diseñada para centralizar,
         organizar y facilitar el acceso a los trabajos de investigación realizados por estudiantes,
          docentes y colaboradores de nuestra institución. Su objetivo principal es promover 
          la difusión del conocimiento académico, garantizar la preservación de los documentos y
           proporcionar un espacio accesible para consultas y referencias.</b>
        </p></strong>
    </div><br>
    <hr/>
    <div class="instituciones px-1" style="overflow: hidden; max-width: 75rem; margin: 1.25rem auto;">
    <div class="contenedor ">
        <ul class="row">
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.cumex.org.mx/" rel="noopener noreferrer"  target="_blank"><img src="src/img/conv_1.png" alt="CUMEX"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.virtualeduca.org/" rel="noopener noreferrer"  target="_blank"><img src="src/img/conv_3.png" alt="Virtual educa"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.anuies.mx/" rel="noopener noreferrer"   target="_blank"><img src="src/img/conv_10.png" alt="anuies"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.copaes.org/" rel="noopener noreferrer"  target="_blank"><img src="src/img/conv_8.png" alt="COPAES"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.ciees.edu.mx/" rel="noopener noreferrer"  target="_blank"><img src="src/img/conv_9.png" alt="CIEES"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.contraloriasocial.unach.mx/" rel="noopener noreferrer"  target="_blank"><img src="src/img/contraloria_social.jpg" alt="Contraloria social"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.cudi.mx/" rel="noopener noreferrer"  target="_blank"><img src="src/img/conv_6.png" alt="CUDI"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.ecoesad.org.mx/"  rel="noopener noreferrer"  target="_blank"><img src="src/img/conv_5.png" alt="ECOESAD"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.sined.mx/sined/" rel="noopener noreferrer"  target="_blank"><img src="src/img/conv_2.png" alt="SINED"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://educontinua-amecyd.com/" rel="noopener noreferrer"  target="_blank"><img src="src/img/amecyd.png" alt="AMECYD"></a></li>
            </ul>
        </div>
    </div>
    <?php
        include("src/vista/footer.php");
    ?>
</body>
<script src="bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
