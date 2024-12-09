<?php
require("../modelo/conexion.php");
require("../controlador/configuracion/constantes.php");


$resultados_por_pagina = 12;

$supervisor = isset($_GET['supervisor']) ? $_GET['supervisor'] : '';
$generacion = isset($_GET['generacion']) ? $_GET['generacion'] : '';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'Descendente'; 

// Asegúrate de convertir los valores a enteros
$pagina_actual = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$resultados_por_pagina = isset($_GET['resultados_por_pagina']) && is_numeric($_GET['resultados_por_pagina']) ? (int)$_GET['resultados_por_pagina'] : 12;

$indice_inicial = ($pagina_actual - 1) * $resultados_por_pagina;


// Construcción de la consulta SQL base
$query = "SELECT * FROM tesinas WHERE 1=1";
if (!empty($fecha)) {
    $query .= " AND (año_publicacion LIKE :fecha)";
}
if (!empty($search)) {
    $query .= " AND (Nombre_tesina LIKE :search OR Autor_tesina LIKE :search OR palabras_clave LIKE :search)";
}
if ($supervisor != '' && $supervisor != 'Todos') {
    $query .= " AND Supervisor_tesina = :supervisor";
}
if ($generacion != '' && $generacion != 'Todas') {
    $query .= " AND Generacion = :generacion";
}
$query .= " ORDER BY Nombre_tesina " . ($orden === 'Descendente' ? 'ASC' : 'DESC');

$query .= " LIMIT :limite OFFSET :offset";

// Preparación de la consulta
$consulta = $conn->prepare($query);

if (!empty($fecha)) {
    $fecha_param = '%' . $fecha . '%';
    $consulta->bindParam(':fecha', $fecha_param, PDO::PARAM_STR);
}
if (!empty($search)) {
    $search_param = '%' . $search . '%';
    $consulta->bindParam(':search', $search_param, PDO::PARAM_STR);
}
if ($supervisor != '' && $supervisor != 'Todos') {
    $consulta->bindValue(':supervisor', $supervisor, PDO::PARAM_STR);
}
if ($generacion != '' && $generacion != 'Todas') {
    $consulta->bindValue(':generacion', $generacion, PDO::PARAM_INT);
}

$consulta->bindValue(':limite', $resultados_por_pagina, PDO::PARAM_INT);
$consulta->bindValue(':offset', $indice_inicial, PDO::PARAM_INT);

// Ejecución de la consulta
$consulta->execute();

$consulta_total = "SELECT COUNT(*) as total FROM tesinas WHERE 1=1";
if (!empty($fecha)) {
    $consulta_total .= " AND (año_publicacion LIKE :fecha)";
}
if (!empty($search)) {
    $consulta_total .= " AND (Nombre_tesina LIKE :search OR Autor_tesina LIKE :search OR palabras_clave LIKE :search)";
}
if ($supervisor != '' && $supervisor != 'Todos') {
    $consulta_total .= " AND Supervisor_tesina = :supervisor";
}
if ($generacion != '' && $generacion != 'Todas') {
    $consulta_total .= " AND Generacion = :generacion";
}

$stmt_total = $conn->prepare($consulta_total);

if (!empty($fecha)) {
    $stmt_total->bindParam(':fecha', $fecha_param, PDO::PARAM_STR);
}
if (!empty($search)) {
    $stmt_total->bindParam(':search', $search_param, PDO::PARAM_STR);
}
if ($supervisor != '' && $supervisor != 'Todos') {
    $stmt_total->bindParam(':supervisor', $supervisor, PDO::PARAM_STR);
}
if ($generacion != '' && $generacion != 'Todas') {
    $stmt_total->bindParam(':generacion', $generacion, PDO::PARAM_INT);
}

$stmt_total->execute();
$total_tesinas = $stmt_total->fetch(PDO::FETCH_ASSOC)['total'];
$total_paginas = ceil($total_tesinas / $resultados_por_pagina);

?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="http://localhost/Repositorio/src/img/logoEpcle.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <title>Repositorio de Posgrado Facultad de Humanidades C-VI</title>

    <style>
        form {
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
        }
        .img-wrap {
            width: 100%;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .img-wrap img {
            max-width: 100%;
            max-height: 100%;
        }
        .info-wrap .title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        a{
            text-decoration: none;
            color: #000000;
        }
        .c{
    margin-top:30px;
}

.filter-col{
    padding-left:10px;
    padding-right:10px;
}
.activo{
    background-color:#D2A92D;
}
        
    </style>
</head>
<body>
<?php
if (isset($_GET["send"])){
     switch($_GET["send"]){
         case "true";
?>
<script>
      $(document).ready(function(){
      alertify.notify('Tesina compartida correctamente', 'success', 3);
    });
</script>
<?php
break;
case "false";
?>
<script>
      $(document).ready(function(){
      alertify.error('Ocurrio un error al compartir la tesina', 3);
    });
</script>
<?php
break;
}
}
?>
<?php include("headerEpcle.php"); ?>

<div class="container mt-4">
            <form id="search-form" class="row g-3 justify-content-center">
            <div class="col-auto" >
        <button type="button" class="btn btn-modal " data-bs-toggle="collapse" data-bs-target="#filter-panel">
            <i class="fa fa-gear"></i>Filtros
        </button>
        </div>
                <div class="col-9 col-md-8">
                    <input class="form-control" type="search" name="busqueda" id="inputBusqueda" value="<?php echo $search; ?>" placeholder="Buscar por título, autor o palabra clave...">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn buscar">Buscar</button>
                </div>
            </form>

            <?php include('filtros.php'); ?>
</div> 

<div class="container">

    <div class="row" id="resultados">
        <?php if ($consulta->rowCount() > 0) {?>
            <!-------------div class="d-flex gap-2 justify-content-center py-5">
  <span class="badge d-flex p-2 align-items-center text-bg-primary rounded-pill">
    <span class="px-1">Primary</span>
    <a href="#"><svg class="bi ms-1" width="16" height="16"><use xlink:href="#x-circle-fill"/></svg></a>
  </span>
  <span class="badge d-flex p-2 align-items-center text-primary-emphasis bg-primary-subtle rounded-pill">
    <span class="px-1">Primary</span>
    <a href="#"><svg class="bi ms-1" width="16" height="16"><use xlink:href="#x-circle-fill"/></svg></a>
  </span>
  <span class="badge d-flex p-2 align-items-center text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
    <span class="px-1">Primary</span>
    <a href="#"><svg class="bi ms-1" width="16" height="16"><use xlink:href="#x-circle-fill"/></svg></a>
  </span>
</div------------------>
<main class="col-md-12 ">

<div class="row ">
<?php
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $id_tesis = $fila["idtesinas"];
?>
    <div class="col-12 col-md-3 mb-3">
    
        <a href="#ver_<?php echo $id_tesis; ?>" data-bs-toggle="modal" >
            <figure class="card card-product-grid" title="<?php echo ucwords($fila["Nombre_tesina"]); ?>">
            <div class="img-wrap">
            
                <img  src="../archivos/<?php echo $fila["imagen_portada"]; ?>" class="img-fluid">

            </div>
            <figcaption class="info-wrap border-top">

                <p class="title mb-2"><?php echo ucwords(strtolower($fila["Nombre_tesina"])); ?></p>
                <b><p class="text-muted"><?php echo ucwords(strtolower($fila["Autor_tesina"])); ?></p></b>
    
            </figcaption>
            </figure>
            </a>
    </div>
    <?php include('utils/modalVerTesis.php'); }  } else {?>
</div>
   
            <div class="d-flex align-items-center justify-content-center">
        <div class="text-center row">
            <div class=" col-md-6">
                <img src="https://img.freepik.com/vector-gratis/dibujado-mano-concepto-datos_52683-127818.jpg" alt=""
                    class="img-fluid">
            </div>
            <div class=" col-md-6 mt-5">
                <p class="fs-3"> <span class="text-danger">Opps!</span> No se encontraron resultados.</p>
                <p class="lead">
                    No fue posible encontrar resultados para <b> <?php echo $search;?></b><br>
                    Es posble que haya en error en el link
                </p>
                <a href="resultados.php" class="btn buscar">Volver</a>
            </div>

        </div>
    </div> <?php }?>
    <nav class="mt-4 text">
  <ol class="pagination justify-content-center">
    <?php if ($pagina_actual > 1) { ?>
      <li class="page-item">
        <a class="page-link buscar" href="resultados.php?repositorio=todo&fecha=<?php echo urlencode($fecha); ?>&supervisor=<?php echo urlencode($supervisor); ?>&generacion=<?php echo urlencode($generacion); ?>&search=<?php echo urlencode($search); ?>&resultados_por_pagina=<?php echo $resultados_por_pagina; ?>&orden=<?php echo urlencode($orden); ?>&page=<?php echo $pagina_actual - 1; ?>">
          <i class="fa fa-angle-double-left" aria-hidden="true"></i>
        </a>
      </li>
    <?php } ?>

    <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
      <li class="page-item <?php echo ($i == $pagina_actual) ? 'activo' : ''; ?>">
        <a class="page-link buscar" href="resultados.php?repositorio=todo&fecha=<?php echo urlencode($fecha); ?>&supervisor=<?php echo urlencode($supervisor); ?>&generacion=<?php echo urlencode($generacion); ?>&search=<?php echo urlencode($search); ?>&resultados_por_pagina=<?php echo $resultados_por_pagina; ?>&orden=<?php echo urlencode($orden); ?>&page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </li>
    <?php } ?>

    <?php if ($pagina_actual < $total_paginas) { ?>
      <li class="page-item">
        <a class="page-link buscar" href="resultados.php?repositorio=todo&fecha=<?php echo urlencode($fecha); ?>&supervisor=<?php echo urlencode($supervisor); ?>&generacion=<?php echo urlencode($generacion); ?>&search=<?php echo urlencode($search); ?>&resultados_por_pagina=<?php echo $resultados_por_pagina; ?>&orden=<?php echo urlencode($orden); ?>&page=<?php echo $pagina_actual + 1; ?>">
          <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        </a>
      </li>
    <?php } ?>
  </ol>
</nav>

</main>
    </div>
</div>
<?php
        include("footer.php");
    ?>

</body>
<script src="../../bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
        $(document).ready(function(){

            $('#search-form').on('submit', function(event){
                event.preventDefault(); 
                var query = $('#inputBusqueda').val();
                if (query != '') {
                    window.location.href = 'resultados.php?search=' + encodeURIComponent(query);
                }
                else{
                    window.location.href = 'resultados.php';
                }
            });
        });

        $(document).ready(function(){
            $('#Formfiltros').on('submit', function(event){
                event.preventDefault();
                
                // Obtiene todos los valores del formulario
                var formData = {
                    repositorio: $('#repositorio').val(),
                    fecha: $('#fecha').val(),
                    supervisor: $('#supervisor').val(),
                    generacion: $('#generaciones').val(),
                    search: $('#search').val(),
                    resultados_por_pagina: $('#resultados_por_pagina').val(),
                    orden: $('#orden').val()
                };

                // Crea la cadena de consulta URL con los parámetros de formData
                var query = $.param(formData);
                
                if (query !== '') {
                    // Redirecciona a la página con los parámetros en la URL
                    window.location.href = 'resultados.php?' + query;
                }
            });
        });

        $(document).ready(function(){
                $('[data-bs-toggle="tooltip"]').tooltip({
                    html: true
            });

                $('[data-bs-toggle="popover"]').popover({
                html: true,
                trigger: 'click'
            });
        });
        


  </script>

</html>

