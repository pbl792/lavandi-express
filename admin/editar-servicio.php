<?php 
include '../includes/funciones.php';
include '../includes/db.php';
revisar_sesion();

// 1. Obtener el ID del servicio a editar
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: gestionar-servicios.php");
    exit();
}

$id = $_GET['id'];

// 2. Consultar los datos actuales de ese servicio
$query = "SELECT * FROM servicios WHERE id = $id";
$resultado = mysqli_query($conexion, $query);
$servicio = mysqli_fetch_assoc($resultado);

// Si el servicio no existe, redirigir
if(!$servicio) {
    header("Location: gestionar-servicios.php");
    exit();
}

// 3. Procesar la actualización cuando se envíe el formulario
if(isset($_POST['actualizar'])) {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $precio = $_POST['precio'];
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $activo = isset($_POST['activo']) ? 1 : 0; // Checkbox para activar/desactivar
    
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
    <title>Editar Servicio - Lavandi</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="background: #f4f7f6; padding-top: 50px;">
    <div style="max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
        <h2 class="color-azul">Editar Servicio</h2>
        <p style="font-size: 0.9em; color: gray;">Modificando: <?php echo $servicio['nombre']; ?></p>

        <form method="POST">
            <label>Nombre del Servicio:</label>
            <input type="text" name="nombre" value="<?php echo $servicio['nombre']; ?>" required style="width:100%; padding:10px; margin: 10px 0;">
            
            <label>Precio (€):</label>
            <input type="number" step="0.01" name="precio" value="<?php echo $servicio['precio']; ?>" required style="width:100%; padding:10px; margin: 10px 0;">
            
            <label>Descripción:</label>
            <textarea name="descripcion" rows="4" style="width:100%; padding:10px; margin: 10px 0;"><?php echo $servicio['descripcion']; ?></textarea>
            
            <div style="margin: 15px 0;">
                <label>
                    <input type="checkbox" name="activo" <?php echo $servicio['activo'] ? 'checked' : ''; ?>> Servicio Activo
                </label>
            </div>
            
            <button type="submit" name="actualizar" class="btn-lavandi boton-azul-relleno" style="width:100%; cursor:pointer;">Guardar Cambios</button>
            <a href="gestionar-servicios.php" style="display:block; text-align:center; margin-top:15px; color:gray;">Cancelar</a>
        </form>
    </div>
</body>
</html>