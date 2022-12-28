<?php 
    session_start();

    // Eliminamos la session
    session_unset();
    session_destroy();

    // Redirección
    header('Location: index.php');

?>