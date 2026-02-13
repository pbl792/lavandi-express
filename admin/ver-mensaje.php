<?php 
// 1. Debug desactivado (Pauta Día 15 Finalizada)
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

include '../includes/funciones.php';
include '../includes/db.php';
revisar_sesion();

// 2. Validar ID
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: mensajes.php");
    exit();
}

$id = $_GET['id'];

// 3. Marcar como leído
mysqli_query($conexion, "UPDATE mensajes SET leido = 1 WHERE id = $id");

$resultado = mysqli_query($conexion, "SELECT * FROM mensajes WHERE id = $id");
$m = mysqli_fetch_assoc($resultado);

if(!$m) {
    header("Location: mensajes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Leer Mensaje - Lavandi Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body style="background: #f4f7f6; padding-top: 50px;">
    <div style="max-width: 700px; margin: auto; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05);">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
            <div>
                <h2 class="color-azul" style="margin: 0;"><?php echo htmlspecialchars($m['asunto']); ?></h2>
                <p style="color: gray; margin: 5px 0;">De: <strong><?php echo htmlspecialchars($m['nombre']); ?></strong> (<?php echo htmlspecialchars($m['email']); ?>)</p>
            </div>
            <span style="background: #e9ecef; padding: 5px 12px; border-radius: 20px; font-size: 0.8em; color: #666;">
                <?php echo date('d/m/Y H:i', strtotime($m['fecha'])); ?>
            </span>
        </div>
        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
        <div style="background: #f9f9f9; padding: 30px; border-radius: 12px; line-height: 1.7; color: #333; min-height: 200px; border-left: 5px solid var(--azul-lavandi);">
            <?php echo nl2br(htmlspecialchars($m['mensaje'])); ?>
        </div>
        <div style="margin-top: 35px; display: flex; justify-content: space-between;">
            <a href="mensajes.php" style="text-decoration: none; color: #666; font-weight: bold;"><i class="bi bi-arrow-left"></i> Volver</a>
            <a href="mailto:<?php echo $m['email']; ?>" class="btn-lavandi boton-azul-relleno" style="text-decoration: none;"><i class="bi bi-reply-fill"></i> Responder</a>
        </div>
    </div>
</body>
</html>