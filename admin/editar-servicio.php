<?php 
include '../includes/funciones.php';
include '../includes/db.php';
revisar_sesion();

// 1. Validar el ID
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: gestionar-servicios.php");
    exit();
}

$id = $_GET['id'];

// 2. Obtener datos actuales
$query = "SELECT * FROM servicios WHERE id = $id";
$resultado = mysqli_query($conexion, $query);
$servicio = mysqli_fetch_assoc($resultado);

if(!$servicio) {
    header("Location: gestionar-servicios.php");
    exit();
}

// 3. Procesar actualización
if(isset($_POST['actualizar'])) {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $precio = $_POST['precio'];
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $activo = isset($_POST['activo']) ? 1 : 0;
    
    $query_update = "UPDATE servicios SET 
                     nombre = '$nombre', 
                     precio = '$precio', 
                     descripcion = '$descripcion', 
                     activo = $activo 
                     WHERE id = $id";
    
    if(mysqli_query($conexion, $query_update)) {
        header("Location: gestionar-servicios.php?msg=actualizado");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Servicio - Lavandi Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body style="background: #f4f7f6; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">

    <div style="width: 100%; max-width: 600px; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="background: #ffc107; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                <i class="bi bi-pencil-fill" style="color: white; font-size: 1.5rem;"></i>
            </div>
            <h2 class="color-azul negrita">Editar Servicio</h2>
            <p style="color: #666;">Modificando: <strong><?php echo $servicio['nombre']; ?></strong></p>
        </div>

        <form method="POST">
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #444;">
                    <i class="bi bi-tag"></i> Nombre del Servicio
                </label>
                <input type="text" name="nombre" value="<?php echo $servicio['nombre']; ?>" required 
                       style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #444;">
                    <i class="bi bi-currency-euro"></i> Precio de venta
                </label>
                <input type="number" step="0.01" name="precio" value="<?php echo $servicio['precio']; ?>" required 
                       style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #444;">
                    <i class="bi bi-card-text"></i> Descripción
                </label>
                <textarea name="descripcion" rows="4" 
                          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; resize: none;"><?php echo $servicio['descripcion']; ?></textarea>
            </div>

            <div style="margin-bottom: 25px; padding: 10px; background: #f9f9f9; border-radius: 8px;">
                <label style="cursor: pointer; display: flex; align-items: center; gap: 10px; font-weight: bold; color: #444;">
                    <input type="checkbox" name="activo" style="width: 18px; height: 18px;" <?php echo $servicio['activo'] ? 'checked' : ''; ?>> 
                    ¿Mostrar este servicio en la web?
                </label>
            </div>

            <div style="display: flex; gap: 15px;">
                <a href="gestionar-servicios.php" class="btn-lavandi" 
                   style="flex: 1; text-align: center; background: #eee; color: #666; text-decoration: none; padding: 12px; border-radius: 8px; font-weight: bold;">
                    Cancelar
                </a>
                <button type="submit" name="actualizar" class="btn-lavandi boton-azul-relleno" 
                        style="flex: 2; border: none; cursor: pointer; padding: 12px; border-radius: 8px; font-weight: bold;">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>

</body>
</html>