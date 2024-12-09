<?php
require("../modelo/conexion.php");
require("../controlador/configuracion/constantes.php");


$resultados_por_pagina = 12;

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
        
    </style>
</head>
<body>

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
    <?php include('modalVerTesis.php'); }  } else {?>
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
    <li class="page-item"><a class="page-link buscar" href="resultados.php?search=<?php echo $search; ?>&page=<?php echo $pagina_actual - 1; ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
  <?php } ?>

  <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
    <li class="page-item <?php if ($i == $pagina_actual); ?>"><a class="page-link buscar" href="resultados.php?search=<?php echo $search; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php } ?>

   <?php if ($pagina_actual < $total_paginas) { ?>
    <li class="page-item"><a class="page-link buscar" href="resultados.php?search=<?php echo $search; ?>&page=<?php echo $pagina_actual + 1; ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
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

        // Envía los datos por AJAX a buscar.php
        $.ajax({
            url: 'buscar.php',
            method: 'GET',
            data: formData,
            success: function(data) {
                $('#resultados').html(data);
            }
        });
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

