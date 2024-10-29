<form id="form-tarea" action="<?= $action ?>" method="POST" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><?= $modal === 'nuevo' ? 'Crear tarea' : 'Editar tarea' ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="inp-username" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="inp-dni" name="dni" value="<?= $tarea['dni'] ?? '' ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="inp-username" class="form-label">TITULO</label>
                        <input type="text" class="form-control" id="inp-titulo" name="titulo" value="<?= $tarea['titulo'] ?? '' ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="inp-descripcion" class="form-label">DESCRIPCION</label>
                        <textarea class="form-control" id="inp-descripcion" rows="4" id="inp-descripcion" name="descripcion"><?= $tarea['descripcion'] ?? '' ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="inp-username" class="form-label">FECHA VENCIMIENTO</label>
                        <input type="date" class="form-control" id="inp-fecha_vencimiento" name="fecha_vencimiento" value="<?= $tarea['fecha_vencimiento'] ?? '' ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="inp-username" class="form-label">ESTADO</label>
                        <!--<input type="text" class="form-control" id="inp-id_estado" name="id_estado" value="<?= $tarea['id_estado'] ?? '' ?>">-->
                        <select class="form-select" id="inp-id_estado" name="id_estado">
                            <option selected></option>
                            <?php
                            foreach ($estados as $key => $estado) {
                                $selected = (intval(($tarea['id_estado'] ?? '0')) === intval($estado['id_estado'])) ? 'selected' : '';

                                echo '<option value="' . $estado['id_estado'] . '" ' . $selected . '>' . $estado['estado'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>