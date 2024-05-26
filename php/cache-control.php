<?php
    // Este código PHP se utiliza para controlar la caché de una página 
    // Establecer encabezados para evitar el caché y no guardar historial
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
?>