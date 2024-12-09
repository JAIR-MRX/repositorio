<?php
require("../../modelo/conexion.php");
require("../../controlador/configuracion/constantes.php");



$resultados_por_pagina = 10;

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $pagina_actual = (int)$_GET['page'];
} else {
    $pagina_actual = 1;
}
//href="../controlador/download.php?id=<?php echo $id_tesis; 

$indice_inicial = ($pagina_actual - 1) * $resultados_por_pagina;

if (isset($_GET['search'])) {
    $search = $_GET['search'];
  
    $consulta = $conn->prepare("SELECT * FROM tesinas WHERE Nombre_tesina LIKE ? OR Autor_tesina LIKE ? OR palabras_clave LIKE ? OR año_publicacion LIKE ? LIMIT ?, ?");
    $consulta->bindValue(1, "%$search%", PDO::PARAM_STR);
    $consulta->bindValue(2, "%$search%", PDO::PARAM_STR);
    $consulta->bindValue(3, "%$search%", PDO::PARAM_STR);
    $consulta->bindValue(4, "%$search%", PDO::PARAM_STR);
    $consulta->bindValue(5, (int)$indice_inicial, PDO::PARAM_INT);
    $consulta->bindValue(6, (int)$resultados_por_pagina, PDO::PARAM_INT);
    $consulta->execute();
    
 
    $consulta_total = $conn->prepare("SELECT COUNT(*) as total FROM tesinas WHERE Nombre_tesina LIKE ? OR Autor_tesina LIKE ? OR palabras_clave LIKE ? OR año_publicacion LIKE ?");
    $consulta_total->execute(["%$search%", "%$search%", "%$search%", "%$search%"]);
} else {
    $search = "";

    $consulta = $conn->prepare("SELECT * FROM tesinas LIMIT ?, ?");
    $consulta->bindValue(1, (int)$indice_inicial, PDO::PARAM_INT);
    $consulta->bindValue(2, (int)$resultados_por_pagina, PDO::PARAM_INT);
    $consulta->execute();

    $consulta_total = $conn->prepare("SELECT COUNT(*) as total FROM tesinas");
    $consulta_total->execute();
}


$total_tesinas = $consulta_total->fetch(PDO::FETCH_ASSOC)['total'];
$total_paginas = ceil($total_tesinas / $resultados_por_pagina);

$ruta="index.php";
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
    <style>
        .nav-link{
            color: #ffff; 
        }
        .nav-link:hover{
            color: #D2A92D;
        }
        td{
            max-width: 120px;
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
        <input class="form-control me-2" type="text" name="busqueda" id="inputBusqueda" value="<?php echo $search; ?>" placeholder="Buscar" aria-label="Search">
        <button class="btn fa fa-search text-light" type="submit"></button>
      </form>
    </div>
  </div>
</nav>
</div><br><br>
        <?php
                if (isset($_GET["update"])){
                     switch($_GET["update"]){
                         case "true";
        ?>
        <div class="ms-3 alert alert-success alert-dismissible fade show col-12 col-md-4 z-3" role="alert" id="alerta">
            <strong>Tesina editada correctamente.</strong>
        </div>
        <?php
        break;

        case "false";
        ?>
          <div class="ms-3 alert alert-danger alert-dismissible fade show col-12 col-md-4 z-3" role="alert" id="alerta">
              <strong>Error al editar los datos de la tesina.</strong>
          </div>
          <?php
        break;
        }
        }
        ?>

        <div class="d-md-flex justify-content-md-end px-5">
                <button type="button" class="btn buscar" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
        </div>
        <?php include('../utils/modalagregar.php'); ?>

<div class="table-responsive px-5">
  <table class="table table-hover table-bordered caption-top">
    <caption>Resultado mostrados: <?php echo $total_tesinas; ?></caption>
    <thead>
      <tr>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Director</th>
        <th>Año</th>
        <th>Generacion</th>
        <th>Palabras clave</th>
        <th>Descripcion</th>
        <th>Portada</th>
        <th>Archivo</th>
        <th>Accion</th>
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
            $palabrasClave = $fila["palabras_clave"];
            $descripcion = $fila["descripcion"];
            $rutaArchivo = "../".$fila["ruta_archivo"];
            $portada = $fila["imagen_portada"];

            $campos = [
                "Nombre_tesina" => $nombreTesina,
                "Autor_tesina" => $autorTesina,
                "Supervisor_tesina" => $supervisorTesina,
                "año_publicacion" => $anoPublicacion,
                "generacion" => $generacion,
                "Palabras_clave" => $palabrasClave,
                "Descripción" => $descripcion,
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
        <td >
            <div class="btn-group" role="group">
                <a href="#editar_<?php echo $id_tesis; ?>" data-bs-toggle="modal">
                    <i class="fa fa-pencil btn btn-success" title="Editar"></i>
                </a>
                
                <a href="#leer" data-bs-toggle="modal">
                    <i class="fa fa-eye btn btn-primary" title="Visualizar"></i>
                    
                </a>
                <a href="#Eliminar_<?php echo $id_tesis; ?>" data-bs-toggle="modal">
                    <i class="fa fa-trash btn btn-danger" title="Eliminar"></i>
                </a>
                
            </div>
        </td>
        <?php include('../utils/modalEliminar.php'); ?>
        <?php include('../utils/modalEditar.php'); ?>
        <?php //include('../modalleer.php'); ?>
      </tr>
      <?php
        }
      ?>

    </tbody>
  </table>
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end px-5">
        <li class="page-item <?php if($pagina_actual == 1) echo 'disabled'; ?>">
            <a class="page-link" href="index.php?search=<?php echo $search; ?>&page=<?php echo $pagina_actual - 1; ?>">Anterior</a>
        </li>
        <?php for($i = 1; $i <= $total_paginas; $i++): ?>
            <li class="page-item <?php if($pagina_actual == $i) echo 'active'; ?>">
                <a class="page-link" href="index.php?search=<?php echo $search; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?php if($pagina_actual == $total_paginas) echo 'disabled'; ?>">
            <a class="page-link" href="index.php?search=<?php echo $search; ?>&page=<?php echo $pagina_actual + 1; ?>">Siguiente</a>
        </li>
    </ul>
</nav>

<hr/>

<div class="instituciones" style="overflow: hidden;">
    <div class="contenedor">
        <ul class="py-5 px-5 row">
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

$('#search-form').on('submit', function(event){
    event.preventDefault(); 
    var query = $('#inputBusqueda').val();
    if (query != '') {
        window.location.href = 'index.php?search=' + encodeURIComponent(query);
    }
});
});

$(document).ready(function(){
  $('[data-bs-toggle="tooltip"]').tooltip({
    html: true
  }); 
});

setTimeout(() => {
        const alerta = document.getElementById('alerta');
        alerta.classList.remove('show'); // Oculta con transición
        alerta.classList.add('fade'); // Aplica la clase fade para transición suave

        // Elimina el elemento del DOM después de que la transición termine
        alerta.addEventListener('transitionend', () => {
            alerta.remove();
        });
    }, 2000);
</script>
</html>
