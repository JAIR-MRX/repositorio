<?php
require("../../modelo/conexion.php");
require("../../controlador/configuracion/constantes.php");

$consulta = $conn->prepare("SELECT *  FROM tesinas ORDER BY idtesinas DESC LIMIT 5;");
$consulta->execute();

$consulta1 = $conn->prepare("SELECT 
    COUNT(DISTINCT Supervisor_tesina) AS Total_Supervisores, 
    COUNT(*) AS Total_filas
FROM tesinas;;");
$consulta1->execute();
while($fila1 = $consulta1->fetch(PDO::FETCH_ASSOC)) {
  $tesinas = $fila1["Total_filas"];
  $supervisores = $fila1["Total_Supervisores"];
}
$ruta="home.php";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <title>Repositorio de Posgrado Facultad de Humanidades C-VI</title>
   <style>
    .card{
      float: bottom;
    }
    td{
      max-width: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        a{
            text-decoration: none;
            color: #000000;
        }
   </style>

</head>

<body>

<nav class="d-flex flex-wrap px-5 py-1 mb-4" style="background-color: #D2A92D;">
  <div class="container-fluid">
      <img class="img-fluid" src="../../controlador/configuracion/img/<?php echo BANNER_POSGRADO;?>" width="670" height="425" alt="Banner epcle" class="d-inline-block align-text-top ">
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
          <a class="nav-link" aria-current="page" href="home.php">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">ARCHIVOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="config.php">CONFIGURACION</a>
        </li>
      </ul>
      <form class="d-flex" role="search"  id="search-form">
        <input class="form-control me-2" type="text" name="busqueda" id="inputBusqueda" value="." placeholder="Buscar" aria-label="Search">
        <button class="btn fa fa-search text-light" type="submit"></button>
      </form>
    </div>
  </div>
</nav>
</div><br>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold text-dark mb-3">Panel de administrador Repositorio de Posgrado</h2>
            </div>
        </div>
</div>


<section class="py-3 py-md-5">
  <div class="container">
    <div class="row gy-4">
      <!-- Card 1 -->
      <div class="col-12 col-md-4">
        <div class="card widget-card border-primary shadow-sm">
          <div class="card-body p-3"> <!-- Reducido el padding -->
            <div class="row">
              <div class="col-8">
                <h5 class="card-title widget-card-title mb-2">Tesinas Subidas</h5> <!-- Usar h6 y mb-2 para menos espacio -->
                <h5 class="card-subtitle text-body-secondary m-0"><?php echo $tesinas; ?></h5> <!-- Cambiar a h5 -->
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-end">
                  <div class="lh-1 text-white bg-success rounded-circle p-3 d-flex align-items-center justify-content-center"> <!-- p-2 reducido -->
                    <i class="bi bi-book fs-5"></i> <!-- fs-5 para icono más pequeño -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="d-flex align-items-center mt-2"> <!-- Menor espacio superior -->
                  <span class="lh-1 me-2 bg-danger-subtle text-primary rounded-circle p-1 d-flex align-items-center justify-content-center"> <!-- Reducido padding -->
                    <i class="bi bi-arrow-right-short bsb-rotate-45"></i>
                  </span>
                  <div>
                  <a href="index.php" class="fs-7 mb-0 text-secondary">Ver todas las tesinas</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-12 col-md-4">
        <div class="card widget-card border-danger shadow-sm">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <h5 class="card-title widget-card-title mb-2">Supervisores registrados</h5>
                <h5 class="card-subtitle text-body-secondary m-0"><?php echo $supervisores; ?></h5>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-end">
                  <div class="lh-1 text-white bg-warning rounded-circle p-3 d-flex align-items-center justify-content-center">
                    <i class="bi bi-person fs-5"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="d-flex align-items-center mt-2">
                  <span class="lh-1 me-2 bg-success-subtle text-success rounded-circle p-1 d-flex align-items-center justify-content-center">
                    <i class="bi bi-arrow-right-short bsb-rotate-n45"></i>
                  </span>
                  <div>
                    <p class="fs-7 mb-0 text-secondary"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-12 col-md-4">
        <div class="card widget-card border-success shadow-sm">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <h5 class="card-title widget-card-title mb-2">Visitas</h5>
                <h5 class="card-subtitle text-body-secondary m-0">764</h5>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-end">
                  <div class="lh-1 text-white bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-workspace fs-5"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="d-flex align-items-center mt-2">
                  <span class="lh-1 me-2 bg-success-subtle text-success rounded-circle p-1 d-flex align-items-center justify-content-center">
                    <i class="bi bi-arrow-right-short bsb-rotate-n45"></i>
                  </span>
                  <div>
                    <a href="index.php" class="fs-7 mb-0 text-secondary"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="alert alert-warning col-md-10 ms-5" role="alert">
 <h5>Tesina mas descargada.</h5>
 <p><b>Titulo: </b>De La Lectura Del Mundo Al Mundo De La Lectura: Procesos Culturales Lecto-escritores En Una Comunidad Indígena De Los Altos De Guatemala</p>
 <p><b>Autor: </b>Petra Feike</p>
</div>

<div class="d-md-flex justify-content-md-end py-3 px-5 col-md-2">
    <button type="button" class="btn buscar" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
</div>
        <?php include('../utils/modalagregar.php'); ?>

<div class="card mx-5">
  <div class="card-header">
    <p><span><i class="fa fa-book fa-lg"></i></span><b>    Ultimas Tesinas Subidas</b></p>
  </div>
  <div class="table-responsive">
  <table class="table table-hover table-bordered caption-top">
  <thead>
    <tr>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Director</th>
        <th>Año</th>
        <th>Generacion</th>
        <th>Portada</th>
        <th>Archivo</th>
    </tr>
  </thead>
  <tbody>
  <?php
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $id_tesis = $fila["idtesinas"];
            $nombreTesina = $fila["Nombre_tesina"];
            $autorTesina = $fila["Autor_tesina"];
            $supervisorTesina = $fila["Supervisor_tesina"];
            $anoPublicacion = $fila["año_publicacion"];
            $generacion = $fila["generacion"];
            $rutaArchivo = "../".$fila["ruta_archivo"];
            $portada = $fila["imagen_portada"];

            $campos = [
                "Nombre_tesina" => $nombreTesina,
                "Autor_tesina" => $autorTesina,
                "Supervisor_tesina" => $supervisorTesina,
                "año_publicacion" => $anoPublicacion,
                "generacion" => $generacion,
            ];

            echo "<tr>";
            foreach ($campos as $campo => $valor) {
                echo "<td title=\"$valor\" style=\"white-space: nowrap;\">$valor</td>";
            }
      ?>
              <td class="text-center">
            <a><i class="fa fa-file-image btn buscar" data-bs-toggle="tooltip" title="<img src='../../archivos/<?php echo $portada; ?>' alt='Portada' width='150px' height='200px'>"></i></a>
        </td>
        <td class="text-center">
            <a target ="_blank"  href="<?php echo $rutaArchivo; ?>"><i class="fa fa-file-pdf btn btn-light" title="Ver archivo"></i></a>
            <a  href="../../controlador/download.php?id=<?php echo $id_tesis; ?>"><i class="fa fa-download btn btn-light" title="Descargar archivo"></i></a>
        </td>

      <?php
        }
      ?>

  </tbody>
</table>
</div>
</div>

<!------div class="container py-5">
<div class="row justify-content-center">
<div class="card text-white bg-info mb-3 ms-3 col-12 col-md-3">
  <div class="card-body d-flex align-items-center">
    <div class="flex-grow-1">
      <h3 class="card-title mb-1">128</h3>
      <p class="card-text mb-0">Tesinas subidas</p>
    </div>
    <div class="icon ms-3">
      <i class="fa fa-book fa-2x"></i>
    </div>
  </div>
  <a href="#" class="text-white text-decoration-none p-2 d-block text-center small" style="background: rgba(0, 0, 0, 0.1);">
    More info <i class="fa fa-arrow-circle-right"></i>
  </a>
</div>
<div class="card text-white bg-success mb-3 ms-3 col-12 col-md-3">
  <div class="card-body d-flex align-items-center">
    <div class="flex-grow-1">
      <h3 class="card-title mb-1">150</h3>
      <p class="card-text mb-0">Tesinas descargadas</p>
    </div>
    <div class="icon ms-3">
      <i class="fas fa-download fa-2x"></i>
    </div>
  </div>
  <a href="#" class="text-white text-decoration-none p-2 d-block text-center small" style="background: rgba(0, 0, 0, 0.1);">
    More info <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>
<div class="card text-white bg-warning mb-3 ms-3 col-12 col-md-3">
  <div class="card-body d-flex align-items-center">
    <div class="flex-grow-1">
      <h3 class="card-title mb-1">150</h3>
      <p class="card-text mb-0">Usuarios</p>
    </div>
    <div class="icon ms-3">
      <i class="fas fa-users fa-2x"></i>
    </div>
  </div>
  <a href="#" class="text-white text-decoration-none p-2 d-block text-center small" style="background: rgba(0, 0, 0, 0.1);">
    More info <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>
</div>
</div----------->



 


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
  $(document).ready(function(){
  $('[data-bs-toggle="tooltip"]').tooltip({
    html: true
  }); 
});
</script>
</html>
