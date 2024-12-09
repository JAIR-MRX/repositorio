<!-- Modal -->
<div class="modal fade" id="Eliminar_<?php echo $id_tesis; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">¿Está seguro de que quiere eliminar este archivo del repositorio?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../controlador/eliminarArchivo.php" method="post">
                    <input type="hidden" name="id_tesis" value="<?php echo $id_tesis; ?>">
                    <p>Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
            </div>
                </form>
        </div>
    </div>
</div>
