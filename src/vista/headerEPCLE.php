<?php

$archivo = 'contador.txt';

if (!file_exists($archivo)) {
    file_put_contents($archivo, '0');
}


if (!isset($_COOKIE['visitado'])) {
    
    $visitas = (int)file_get_contents($archivo);
    
    
    $visitas++;
    
    
    file_put_contents($archivo, $visitas);
    
    // Configurar la cookie para que dure 24 horas
    setcookie('visitado', '1', time() + 86400, "/"); 
    
  
} else {
   
    $visitas = file_get_contents($archivo);

}
?>
<nav class="d-flex flex-wrap px-5 py-1 mb-4" style="background-color: #D2A92D;">
  <div class="container-fluid">
      <img class="img-fluid" src="../controlador/configuracion/img/<?php echo BANNER_ESPECIALIDAD; ?>" width="670" height="425" alt="Banner epcle" class="d-inline-block align-text-top ">
  </div>
</nav>
</header>
<div style="background-color: #18386B; height: 7px; margin-top: -25px;"></div>
<br>
