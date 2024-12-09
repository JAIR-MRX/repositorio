<?php
$tesis = $conn->prepare("SELECT * FROM tesinas WHERE idtesinas = :idtesinas");
$tesis->bindParam(':idtesinas', $id_tesis);
$tesis->execute();

if ($fila_tesis = $tesis->fetch(PDO::FETCH_ASSOC)) {
    $titulo = $fila_tesis["Nombre_tesina"];
    $autor = $fila_tesis["Autor_tesina"];
    $director = $fila_tesis["Supervisor_tesina"];
    $fecha = $fila_tesis["año_publicacion"];
    $generacion = $fila_tesis["generacion"];
    $palabras = $fila_tesis["palabras_clave"];
    $descripcion = $fila_tesis["descripcion"];
    $pdf = $fila_tesis["ruta_archivo"];
    $portada = $fila_tesis["imagen_portada"];
}
?>

<form action="../../controlador/editardatos.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_tesis" value="<?php echo $id_tesis; ?>">

    <div class="modal fade" id="editar_<?php echo $id_tesis; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Editar Archivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="nombre" class="form-label">Título</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                            <input type="text" class="form-control" id="nombre" name="titulo" value="<?php echo $titulo; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="autor" class="form-label">Autor</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $autor; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="director" class="form-label">Director</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-users"></i></span>
                                <input type="text" class="form-control" id="director" name="director" value="<?php echo $director; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="fecha" class="form-label">Fecha de Publicación</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <input type="month" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="portada" class="form-label">Portada</label>
                            <input type="file" class="form-control" id="portada" name="portada">
                            <p>Archivo actual: <?php echo $portada; ?></p>
                        </div>
                        <div class="col-md-4 mb-2">
                        <label class="form-label" for="generaciones">Generacion</label>
                            <select id="generaciones" class="form-select" name="generacion">
                            <option value="<?php echo $generacion; ?>"><?php echo $generacion; ?></option>
                            <?php for ($i = 1; $i <= 13; $i++) { ?>
                                <option value="<?php echo $i . ' Generacion'; ?>"><?php echo $i . ' Generacion'; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="archivo" class="form-label">Archivo PDF</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-file"></i></span>
                            <input type="file" class="form-control" id="archivo" name="archivo" >
                        </div>
                        <p>Archivo actual: <?php echo $pdf; ?></p>
                    </div>

                    <div class="mb-2">
                        <label for="palabras" class="form-label">Palabras clave</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-tags"></i></span>
                            <textarea class="form-control" name="palabras"><?php echo $palabras; ?></textarea>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-file-text"></i></span>
                            <textarea class="form-control" placeholder="Descripción" name="descripcion"><?php echo $descripcion; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>
