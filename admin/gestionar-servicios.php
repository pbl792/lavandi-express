<?php 
include '../includes/funciones.php';
include '../includes/db.php';
revisar_sesion();

// Consultar servicios
$query = "SELECT * FROM servicios";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Servicios - Lavandi</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="contenedor-web" style="padding: 40px 0;">
        <a href="index.php" style="text-decoration: none;">← Volver al Dashboard</a>
        <h1 class="color-azul negrita mt-3">Gestión de Servicios</h1>

        <?php if(isset($_GET['msg'])): ?>
            <?php 
                $mensaje = "";
                if($_GET['msg'] === 'creado') $mensaje = "✅ ¡Servicio añadido correctamente!";
                if($_GET['msg'] === 'actualizado') $mensaje = "✅ ¡Cambios guardados con éxito!";
                if($_GET['msg'] === 'eliminado') $mensaje = "🗑️ El servicio ha sido eliminado.";
            ?>
            <div id="notificacion" style="padding: 15px; margin: 20px 0; border-radius: 5px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; font-weight: bold; animation: fadeIn 0.5s;">
                <?php echo $mensaje; ?>
            </div>

            <script>
                setTimeout(() => {
                    const alerta = document.getElementById('notificacion');
                    if(alerta) {
                        alerta.style.transition = "opacity 0.5s ease";
                        alerta.style.opacity = "0";
                        setTimeout(() => alerta.remove(), 500);
                    }
                }, 3000);
            </script>
        <?php endif; ?>
        <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
            <a href="nuevo-servicio.php" class="btn-lavandi boton-azul-relleno">+ Añadir Nuevo Servicio</a>
        </div>

        <table class="tabla-estilo-lavandi">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td class="negrita"><?php echo $row['nombre']; ?></td>
                    <td><?php echo number_format($row['precio'], 2, ',', '.'); ?> €</td>
                    <td><?php echo $row['activo'] ? '✅ Activo' : '❌ Inactivo'; ?></td>
                    <td>
                        <a href="editar-servicio.php?id=<?php echo $row['id']; ?>" style="color: blue; margin-right: 10px;"><i class="bi bi-pencil-square"></i></a>
                        <a href="eliminar-servicio.php?id=<?php echo $row['id']; ?>" style="color: red;" onclick="return confirm('¿Seguro que quieres borrar este servicio?')"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>