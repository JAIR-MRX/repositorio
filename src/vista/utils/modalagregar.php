
<form action="../../controlador/guardarArchivo.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Agregar un nuevo archivo al Repositorio</h5>
                    <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Titulo del Archivo</label>
                        <input type="hidden" value="<?php echo ($ruta); ?>" name="ruta">
                        <input type="text" class="form-control" id="nombre" name="titulo" placeholder="Titulo del Archivo" focus required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="autor" class="form-label">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="director" class="form-label">Director</label>
                            <input type="text" class="form-control" id="director" name="director" placeholder="Director" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="fecha" class="form-label">Fecha Publicación</label>
                            <input type="month" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="portada" class="form-label">Portada</label>
                            <input type="file" class="form-control" id="portada" name="portada" accept="image/*" required>
                        </div>
                        <div class="col-md-4 mb-3">
                        <label class="form-label" for="generaciones">Generacion</label>
                            <select id="generaciones" class="form-select" name="generacion">
                            <?php for ($i = 1; $i <= 13; $i++) { ?>
                                <option value="<?php echo $i . ' Generacion'; ?>"><?php echo $i . ' Generacion'; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="archivo" class="form-label">Archivo</label>
                        <input type="file" class="form-control" id="archivo" name="archivo" accept="application/pdf" required>
                    </div>

                    <div class="mb-3">
                        <label for="palabras" class="form-label">Palabras clave</label>
                        <textarea class="form-control" id="palabras" name="palabras" placeholder="Palabras clave, separe por una coma." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" required></textarea>
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
