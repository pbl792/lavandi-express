<?php 
include '../includes/funciones.php';
include '../includes/db.php';
revisar_sesion();

if(isset($_POST['crear'])) {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $precio = $_POST['precio'];
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    
    // Por defecto lo creamos como activo (1)
    $query = "INSERT INTO servicios (nombre, precio, descripcion, activo) VALUES ('$nombre', '$precio', '$descripcion', 1)";
    
    if(mysqli_query($conexion, $query)) {
        header("Location: gestionar-servicios.php?msg=creado");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Servicio - Lavandi Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body style="background: #f4f7f6; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">

    <div style="width: 100%; max-width: 600px; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="background: var(--azul-lavandi); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                <i class="bi bi-plus-lg" style="color: white; font-size: 1.5rem;"></i>
            </div>
            <h2 class="color-azul negrita">Nuevo Servicio</h2>
            <p style="color: #666;">Rellena los campos para añadir un nuevo servicio a la web</p>
        </div>

        <form method="POST">
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #444;">
                    <i class="bi bi-tag"></i> Nombre del Servicio
                </label>
                <input type="text" name="nombre" placeholder="Ej: Lavado de Alfombras XL" required 
                       style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #444;">
                    <i class="bi bi-currency-euro"></i> Precio de venta
                </label>
                <input type="number" step="0.01" name="precio" placeholder="0.00" required 
                       style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #444;">
                    <i class="bi bi-card-text"></i> Descripción corta
                </label>
                <textarea name="descripcion" rows="4" placeholder="Describe brevemente en qué consiste el servicio..." 
                          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; resize: none;"></textarea>
            </div>

            <div style="display: flex; gap: 15px;">
                <a href="gestionar-servicios.php" class="btn-lavandi" 
                   style="flex: 1; text-align: center; background: #eee; color: #666; text-decoration: none; padding: 12px; border-radius: 8px; font-weight: bold;">
                    Cancelar
                </a>
                <button type="submit" name="crear" class="btn-lavandi boton-azul-relleno" 
                        style="flex: 2; border: none; cursor: pointer; padding: 12px; border-radius: 8px; font-weight: bold;">
                    Publicar Servicio
                </button>
            </div>
        </form>
    </div>

</body>
</html>