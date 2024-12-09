<?php
$tesis = $conn->prepare("SELECT * FROM tesinas WHERE idtesinas = :idtesinas");
$tesis->bindParam(':idtesinas', $id_tesis);
$tesis->execute();

if ($fila_tesis = $tesis->fetch(PDO::FETCH_ASSOC)) {
    $titulo = $fila_tesis["Nombre_tesina"];
    $autor = $fila_tesis["Autor_tesina"];
    $director = $fila_tesis["Supervisor_tesina"];
    $fechatesis = $fila_tesis["año_publicacion"];
    $palabras = $fila_tesis["palabras_clave"];
    $descripcion = $fila_tesis["descripcion"];
    $pdf = $fila_tesis["ruta_archivo"];
    $portada = $fila_tesis["imagen_portada"];
   
    $nueva_ruta = str_replace("../tesinas/", "http://localhost/repositorio/src/tesinas/", $pdf);

$mensaje = "Hola, me pareció muy interesante el tema que se aborda en esta tesina. Quisiera compartirla contigo, se llama: $titulo. Te adjunto el link para que la puedas ver: $nueva_ruta";
$mensaje_codificado = urlencode($mensaje);
}
?>

<div class="modal fade" id="ver_<?php echo $id_tesis; ?>" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="http://localhost/repositorio/src/archivos/<?php echo $portada; ?>" >
                    </div>
                    <div class="col-md-6" style=" height: 500px; overflow-y: scroll;">
                        <b><p><?php echo ucwords(strtolower($titulo)); ?></p></b>
                        <b><p><i class="fa fa-user"></i> Autor:</b> <?php echo ucwords(strtolower($autor)); ?></p>
                        <b><p><i class="fa fa-calendar"></i> Fecha de publicación:</b> <?php echo ucwords(strtolower($fechatesis)); ?></p>
                        <b><p><i class="fa fa-users"></i> Director o colaborador:</b> <?php echo ucwords(strtolower($director)); ?></h5>
                        <b><p>Descripción:</b> <?php echo $descripcion; ?></p>

                        <div class="btn-group-horizontal mt-2 text-center px-3">
                            <!-- Botón Leer en línea -->
                            <a  target="_blank" href="<?php echo $pdf; ?>" class="btn btn-modal">
                                Leer en línea <i class="fa fa-book" title="Leer en línea"></i>
                            </a>

                            <!-- Botón Descargar -->
                            <a data-bs-toggle="modal" data-bs-dismiss="modal" href="#descargar_<?php echo $id_tesis; ?>" class="btn btn-modal">
                                Descargar <i class="fa fa-download" title="Descargar archivo"></i>
                            </a>
                            
                            <!-- Botón Compartir -->
                            <a tabindex="0" title="Compartir" class="btn btn-modal" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Compartir <i class="fa fa-share-square" title="Compartir"></i> 
                            </a>
                            <ul class="dropdown-menu">
                            <li class='list-group-item px-3'>
                                        <a href="https://api.whatsapp.com/send?text=<?php echo $mensaje_codificado; ?>" target="_blank" title='Enviar por WhatsApp' aria-label='Enviar por WhatsApp'> WhatsApp
                                            <i class='fa-brands fa-whatsapp' style='color: green;' aria-hidden='true'></i>
                                        </a>
                                    </li>
                                    <li class='list-group-item px-3'>
                                        <a data-bs-toggle="modal" data-bs-dismiss="modal" href="#compartirCorreo_<?php echo $id_tesis; ?>">
                                            <i class='fa-regular fa-envelope' style='color: red;' title='Enviar por correo'></i> Correo
                                        </a>
                                    </li>
                            </ul>

                        </div><br>
                        <div>
                        <b><p>Ficha Tecnica:</p></b>

                        
                        <b><p><i class="fa fa-university" aria-hidden="true"></i> Institucion:</b> Universidad Autonoma de chiapas</p>
                        <b><p><i class="fa fa-graduation-cap"></i> Facultad:</b> Facultad de Humanidades Campus VI</p>
                        <b><p><i class="fa fa-book" ></i> Carrera:</b> Especialidad en Procesos Culturales y Lecto-Escritores</h5>
                        <b><p>Referencia biliografica:</b><br>
                        <?php echo ucwords(strtolower($autor)).", (". $fechatesis."), <i>".ucwords(strtolower($titulo))."</i>, Tesis de especialidad, Universidad Autonoma de chiapas. ". str_replace("..","http://localhost/repositorio/src",$pdf); ?>
                          </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>




<div class="modal fade" id="descargar_<?php echo $id_tesis; ?>" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal2Label">Información sobre derechos de autor.</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <b><p>Aviso: <br>
             Concerniente a restricciones de los derechos de autor <br>
            (Por favor lea lo siguiente antes de ver los recursos externos)</p></b>
         <p>


De acuerdo con la Ley sobre Derechos de autor publicada en el Diario Oficial de la Federación el 24 de diciembre de 1996, México. <br>

<b>Capítulo II <br>
De la limitación a los Derechos Patrimoniales <br>

Artículo 148.-</b> Las obras literarias y artísticas ya divulgadas podrán utilizarse, siempre que no se afecte la explotación normal de la obra, sin autorización del titular del derecho patrimonial y sin remuneración, citando invariablamente la fuente y sin alterar la obra, sólo en los siguientes casos:

    <ol>
    <li>Cita de textos, siempre que la cantidad tomada no pueda considerarse como una reproducción simulada y sustancial del contenido de la obra;</li>
    <li>Reprodución de artículos, fotografías, ilustraciones y comentarios referentes a acontecimientos de actualidad, publicados por la prensa o difundidos por la radio o la televisión, o cualquier otro medio de difusión, si esto no hubiere sido expresamente prohibido por el titular del derecho;</li>
    <li>Reprodución de partes de la obra, para la crítica e investigación científica, literaria o artística;</li>
    <li>Reproducción por una sola vez, y en un sólo ejemplar, de una obra literario o artística, para uso personal y privado de quien la hace y sin fines de lucro.</li>
    <li>Las personas morales no podrán valerse de lo dispuesto en esta fracción salvo que se trate de una institución educativa, de investigación, o que no esté dedicada a actividades mercantiles.</li>
    </ol>

    </p>
            <!-- Checkbox de términos y condiciones -->
        <form action="../controlador/download.php" method="get">
            <label for="termsCheckbox"><b>Aceptar términos y condiciones:</b></label>
            <input type="hidden" value="<?php echo $id_tesis; ?>" id="id" name="id">
            <input type="checkbox" id="termsCheckbox" required>
            <p id="termsMessage"></p>

            <button type="submit" class="btn btn-modal" >
                Descargar
            </button>
        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="
         color: #ffffff;
         background-color: #18386B;">Cerrar</button>
        </div>
      </div>
    </div>
  </div>



 

  <div class="modal fade" id="compartirCorreo_<?php echo $id_tesis; ?>" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal2Label">Compartir Tesina por correo.</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="container">

  <form method="POST" action="../controlador/correo/correo.php">

  <input  type="hidden" name="id" value="<?php echo $id_tesis; ?>">

    <!-- Campo para el destinatario -->
    <label class="form-label" for="destinatario">Para:</label>
    <input class="form-control" type="email" id="destinatario" name="destinatario" placeholder="correo@ejemplo.com" required>

    <!-- Campo para CC (con copia)
    <labelclass="form-label"  for="cc">CC:</label>
    <input class="form-control" type="email" id="cc" name="cc" placeholder="correo@ejemplo.com (opcional)">
    -->
    <!-- Campo para el asunto -->
    <label class="form-label" for="asunto">Asunto:</label>
    <input class="form-control" type="text" id="asunto" name="asunto" value ="Tesina: <?php echo $titulo; ?>" placeholder="Escribe el asunto del correo" readonly>

    <!-- Campo para el mensaje (usando TinyMCE) -->
    <label class="form-label" for="mensaje">Mensaje:</label>
    <textarea class="form-control" id="mensaje" name="mensaje" rows="6"><?php echo "Te compartimos la tesina que tiene como titulo " . $titulo .", de la autora " .  $autor ."." ?></textarea> 
</div>
        </div>
        <div class="modal-footer">
                    <button type="submit" class="btn buscar">Enviar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </div>
        </form>
      </div>
    </div>
  </div>



 