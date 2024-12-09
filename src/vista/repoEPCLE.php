<?php
require("../modelo/conexion.php");
require("../controlador/configuracion/constantes.php");
if ($conn == true) {
    $consulta = $conn->prepare("SELECT * FROM tesinas LIMIT 5");
    $consulta->execute();
    $consulta2 = $conn->prepare("SELECT * FROM tesinas WHERE palabras_clave LIKE ? LIMIT 5");
    $consulta2->execute(['%desarrollo%']);
    
}
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="http://localhost/Repositorio/src/img/logoEpcle.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <title>Repositorio de Posgrado Facultad de Humanidades C-VI</title>
    <style>
        form {
            padding: 20px;
            border-radius: 10px;
            background-color: transparent;
        }
        .buscar {
            background-color: #18386B;
            color: white;
        }
        .lista, h5 {
            display: flex;
            flex-direction: column;
            text-align: left;
            color: white;
        }

        .botones-redes {
            position: absolute;
            right: 10px;
            top: 300px;
        }
        #youtube {
            color: red;
        }
        #facebook {
            color: blue;
        }
        #instagram, #correo {
            color: #E1306C;
        }
        ol {
            list-style-type: upper-roman;
            list-style-position: inside;
        }
        h5, li {
            color: white;
        }
.lista{
    background: rgb(24,56,107);
    background: linear-gradient(90deg, rgba(24,56,107,1) 0%, rgba(34,75,139,0.773546918767507) 47%, rgba(210,169,45,1) 100%);
    border-radius: 10px;
}

.swiper-slide {
      display: flex;
      justify-content: center;
    }
    .card {
      width: 18rem;
    }
    .swiper-button-prev, .swiper-button-next {
      color: #000; /* Cambia el color de las flechas */
    }
    .swiper-pagination-bullet-active {
      background-color: #000; /* Cambia el color de los puntos activos */
    }
    .card img{
        height: 300px;
    }
    .card{
        height: 400px;
    }
    .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .btn-modal{    
          display: inline-block; 
         color: #ffffff;
         background-color: #D2A92D;
         border-bottom: 7px solid #18386B;
         padding-top: 10px;
        }

    </style>
</head>
<body>
  <!-- Modal -->
  <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Cómo realizar una búsqueda en este repositorio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe width="100%" height="315" 
                        src="https://www.youtube.com/embed/2OY1aFwKnfs?si=jA3wJxKMD7pQagul&amp;controls=0&amp;autoplay=1" 
                        title="YouTube video player" 
                        frameborder="1" 
                        allow=" autoplay;" autoplay>
                </iframe>
            </div>
        </div>
    </div>
</div>


    <?php include("headerEpcle.php"); ?>
   
    <div class="principal" >
        <div class="container mt-4" >
            <form id="search-form" class="row g-3 justify-content-center">
                <div class="col-9 col-md-8">
                    <input class="form-control" type="search" name="busqueda" id="inputBusqueda" value="" placeholder="Buscar por título, autor o palabra clave...">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn buscar">Buscar</button>
                </div>
            </form><br>
            <div class="contenedor-lista">
            <h5 class="btn-modal">
                Como realizar una busqueda:
            </h5><br>
                <ol class="lista" style="font-size: 15px">
                    <li>Principalmente para realizar una busqueda puedes buscar una palabra o tema en especifico, como por ejemplo "lectura" y se filtraran todas las tesinas, libros o documentos que coincidan con la palabra buscada.</li><br>
                    <li>Puedes realizar busquedas a traves del autor, si conoces el nombre de un determinado autor puedes hacerlo y se filtraran los articulos, tesinas, libros, etc, que pertenezcan a dicho autor.</li><br>
                    <li>Por año de publicacion, si desea buscar los articulos que se hayan publicado en determinado año se filtraran.</li><br>
                    <li>Por titulo de tesis, si conoce el titulo en especifico del articulo de tu interes y si se encuentra en nuestra base de datos, esta se te sera mostrada.</li><br>
                </ol>
            </div>
        </div>
             <!-- Slider -->
  <div class="container my-5">
  <h5 class="btn-modal">
                Articulos destacados:
  </h5><br>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <!-- Cards originales -->
        <?php
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $id_tesis = $fila["idtesinas"];
        ?>
        <div class="swiper-slide"  title="<?php echo ucwords($fila["Nombre_tesina"]); ?>">
          <div class="card">
            <img src="../archivos/<?php echo $fila["imagen_portada"]; ?>" class="card-img-top" alt="Card 1">
            <div class="card-body">
            <p class="card-title"><?php echo ucwords(strtolower($fila["Nombre_tesina"])); ?></p>
            <p class="card-text"><?php echo ucwords(strtolower($fila["Autor_tesina"])); ?></p>
            </div>
          </div>
        </div>
        <?php }?>
        

        <!-- Duplicar slides para el loop -->
        <?php
        while($fila2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
            $id_tesis = $fila2["idtesinas"];
        ?>
        <div class="swiper-slide"  title="<?php echo ucwords($fila2["Nombre_tesina"]); ?>">
          <div class="card">
            <img src="../archivos/<?php echo $fila2["imagen_portada"]; ?>" class="card-img-top" alt="Card 1">
            <div class="card-body">
              <p class="card-title"><?php echo ucwords(strtolower($fila2["Nombre_tesina"])); ?></p>
              <p class="card-text"><?php echo ucwords(strtolower($fila2["Autor_tesina"])); ?></p>
            </div>
          </div>
        </div>
        <?php }?>

      </div>

      <!-- Paginación -->
      <div class="swiper-pagination"></div>
    </div>
  </div>

    </div>


 
    <hr>
    <div class="instituciones px-1" style="overflow: hidden; max-width: 75rem; margin: 1.25rem auto;">
    <div class="contenedor ">
        <ul class="row">
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.cumex.org.mx/" target="_blank"><img src="../img/conv_1.png" alt="CUMEX"></a></ class="col-4 col-sm-2  col-lg-1">
                <li  class="col-4 col-sm-2  col-lg-1"><a href="http://www.virtualeduca.org/" target="_blank"><img src="../img/conv_3.png" alt="Virtual educa"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.anuies.mx/" target="_blank"><img src="../img/conv_10.png" alt="anuies"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.copaes.org/" target="_blank"><img src="../img/conv_8.png" alt="COPAES"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.ciees.edu.mx/" target="_blank"><img src="../img/conv_9.png" alt="CIEES"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.contraloriasocial.unach.mx/" target="_blank"><img src="../img/contraloria_social.jpg" alt="Contraloria social"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.cudi.mx/" target="_blank"><img src="../img/conv_6.png" alt="CUDI"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.ecoesad.org.mx/" target="_blank"><img src="../img/conv_5.png" alt="ECOESAD"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://www.sined.mx/sined/" target="_blank"><img src="../img/conv_2.png" alt="SINED"></a></li>
                <li class="col-4 col-sm-2  col-lg-1"><a href="http://educontinua-amecyd.com/" target="_blank"><img src="../img/amecyd.png" alt="AMECYD"></a></li>
            </ul>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
<script src="../../bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  
    document.addEventListener('DOMContentLoaded', function () {
 
        var myModal = new bootstrap.Modal(document.getElementById('miModal'));
        myModal.show();
    });
    const miModal = document.getElementById('miModal');
    miModal.addEventListener('hidden.bs.modal', function () {
        const iframe = miModal.querySelector('iframe');
        iframe.src = ""; 
    });

    

    $(document).ready(function() {
        $('#search-form').on('submit', function(event) {
            event.preventDefault();
            var query = $('#inputBusqueda').val();
            if (query != '') {
                window.location.href = 'resultados.php?search=' + encodeURIComponent(query)+'&page=1';
            }
        });
    });

    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1, // Por defecto muestra 1 card
      spaceBetween: 30, // Espacio entre cards
      loop: true, // Repetir el slider al llegar al final
      autoplay: {
        delay: 3000, // Cambia de card cada 3 segundos
        disableOnInteraction: false,
      },
      pagination: { // Activar los puntos de paginación
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        768: { // A partir de pantallas de tamaño mediano y superior
          slidesPerView: 3, // Muestra 3 cards
        },
        1024: { // A partir de pantallas grandes
          slidesPerView: 5, // Muestra las 5 cards
        },
      },
    });
</script>
</html>
