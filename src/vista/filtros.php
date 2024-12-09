<?php
    $supervisores = $conn->prepare("SELECT DISTINCT Supervisor_tesina FROM tesinas");
    $supervisores->execute();
?>        
         <div class="c">
    <div class="row">
        <div id="filter-panel" class="collapse filter-panel">
            <div class="card">
                <div class="card-body">
                    <form id="Formfiltros" class="row g-3">
                        <div class="col-12 col-md-4">
                            <label class="form-label" for="repositorio">Buscar en:</label> 
                            <select  class="form-select" name="repositorio" id="repositorio" disabled="disabled"> 
                                <option value="todo">Todo Repositorio de Posgrado</option>
                                <option value="epcle">Especialidad en Procesos culturales y Lecto-Escritores</option>
                                <option value="mecc">Maestria en Estudio culturales</option>
                                <option value="der">Doctorado en Estudios Regionales</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                        <label class="form-label" for="fecha">Fecha de Publicacion:</label>
                            <input class="form-control" type="number"  id="fecha" min="2009" max="2024" step="1" name="fecha">
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label" for="supervisor">Directores o colaboradores:</label>
                            <select id="supervisor" class="form-select" name="supervisor">
                            <option value="Todos">Todos los colaboradores</option>
                            <?php while ($supervisor = $supervisores->fetch(PDO::FETCH_ASSOC)) {?>
                                <option value="<?php echo ucwords(strtolower($supervisor["Supervisor_tesina"])); ?>"><?php echo ucwords(strtolower($supervisor["Supervisor_tesina"])); ?></option>
                            <?php }; ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label" for="generaciones">Generaciones:</label>
                            <select id="generaciones" class="form-select" name="generacion">
                            <option value="Todas">Todas las Generaciones</option>
                            <?php for ($i = 1; $i <= 13; $i++) { ?>
                                <option value="<?php echo $i . ' Generacion'; ?>"><?php echo $i . ' Generacion'; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label" for="search">Buscar por titulo, autor o palabra clave:</label>
                            <input type="text"class="form-control" id="search"  placeholder="Buscar por título, autor o palabra clave...">
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label" for="resultados_por_pagina">Resultados por pagina:</label>
                            <select id="resultados_por_pagina"  name="resultados_por_pagina"class="form-select">
                            <?php for ($i = 12; $i <= 60; $i=$i+12) { ?>
                                <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="col-6 col-md-2">
                            <label class="form-label" for="orden">En orden:</label>
                            <select id="orden" class="form-select" name="orden" >
                                <option value="Descendente">Descendente</option>
                                <option value="Ascendente">Ascendente</option>
                            </select>
                        </div>

                        <div class="col-auto position-absolute bottom-0 end-0 py-3 px-5 ">
                        <button type="submit" class="btn buscar filter-col">Actualizar</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>