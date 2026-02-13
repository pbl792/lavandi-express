<?php 
include '../includes/funciones.php';
include '../includes/db.php';
revisar_sesion();

// Consultar todos los mensajes, los más nuevos primero
$query = "SELECT * FROM mensajes ORDER BY fecha DESC";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes - Lavandi Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="contenedor-web" style="padding: 40px 0;">
        <a href="index.php" style="text-decoration: none;">← Volver al Dashboard</a>
        <h1 class="color-azul negrita mt-3">Mensajes Recibidos</h1>

        <table class="tabla-estilo-lavandi" style="margin-top: 30px;">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Asunto</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                <tr style="<?php echo $row['leido'] == 0 ? 'background: #f0f7ff; font-weight: bold;' : ''; ?>">
                    <td><?php echo $row['leido'] == 0 ? '🔵 Nuevo' : '⚪ Leído'; ?></td>
                    <td><?php echo date('d/m H:i', strtotime($row['fecha'])); ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['asunto']; ?></td>
                    <td>
                        <a href="ver-mensaje.php?id=<?php echo $row['id']; ?>" class="btn-lavandi" style="padding: 5px 10px; font-size: 0.8em;">Leer</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>