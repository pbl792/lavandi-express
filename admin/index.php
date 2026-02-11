<?php 
// 1. Cargamos la función de seguridad
include '../includes/funciones.php';

// 2. Ejecutamos al "portero" (si no hay sesión, nos manda al login)
revisar_sesion(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - Lavandi</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="contenedor-web" style="padding-top: 50px;">
        <h1>Bienvenido al Panel de Control, <span class="resaltado-amarillo"><?php echo $_SESSION['admin_nombre']; ?></span></h1>
        <p>Desde aquí podrás gestionar tus servicios y mensajes.</p>
        
        <div style="margin-top: 20px;">
            <a href="gestionar-servicios.php" class="btn-lavandi boton-azul-relleno">Gestionar Servicios</a>
            <a href="logout.php" class="btn-lavandi" style="color: red;">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>