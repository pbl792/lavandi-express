<?php
function revisar_sesion() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Si la variable de sesión 'admin_id' no existe, es que no se ha logueado
    if(!isset($_SESSION['admin_id'])) {
        header("Location: login.php"); // Lo echamos al login
        exit();
    }
}
?>