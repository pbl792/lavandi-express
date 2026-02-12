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
                    <td><?php echo $row['precio']; ?> €</td>
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