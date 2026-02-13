<?php 
include '../includes/funciones.php';
include '../includes/db.php';
revisar_sesion(); 

// Consulta para actualizar el globo de notificación
$res_mensajes = mysqli_query($conexion, "SELECT COUNT(*) as total FROM mensajes WHERE leido = 0");
$datos_m = mysqli_fetch_assoc($res_mensajes);
$nuevos = $datos_m['total'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - Lavandi</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="contenedor-web" style="padding-top: 50px;">
        <h1>Bienvenido al Panel de Control, <span class="resaltado-amarillo"><?php echo $_SESSION['admin_nombre']; ?></span></h1>
        <p>Gestión integral de Lavandi Express.</p>
        
        <div style="margin-top: 30px; display: flex; gap: 15px; align-items: center;">
            <a href="gestionar-servicios.php" class="btn-lavandi boton-azul-relleno">Gestionar Servicios</a>
            
            <a href="mensajes.php" class="btn-lavandi boton-azul-relleno" style="position: relative; background-color: #28a745; border-color: #28a745;">
                <i class="bi bi-envelope"></i> Ver Mensajes
                <?php if($nuevos > 0): ?>
                    <span style="position: absolute; top: -12px; right: -12px; background: #dc3545; color: white; border-radius: 50%; padding: 2px 8px; font-size: 0.8em; border: 2px solid white; font-weight: bold; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
                        <?php echo $nuevos; ?>
                    </span>
                <?php endif; ?>
            </a>

            <a href="logout.php" class="btn-lavandi" style="color: red; border-color: red;">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>