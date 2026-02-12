<?php
include '../includes/funciones.php';
include '../includes/db.php';
revisar_sesion();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM servicios WHERE id = $id";
    
    if(mysqli_query($conexion, $query)) {
        header("Location: gestionar-servicios.php?msg=eliminado");
    }
}
?>