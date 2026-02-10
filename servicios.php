<?php 
include 'includes/header.php'; 
include 'includes/db.php'; // Conectamos a la base de datos

// 1. Consultar los servicios de la base de datos
$query = "SELECT * FROM servicios WHERE activo = 1";
$resultado = mysqli_query($conexion, $query);
?>

<main class="contenedor seccion-padding">
    <section class="centrar-texto" style="padding: 40px 0 10px 0;">
        <div style="padding: 0 10px;">
            <h1 class="titulo-gigante titulo-gradiente">Nuestros Servicios y Tarifas</h1>
        </div>
        <div class="linea-decorativa"></div>
    </section>

    <div class="fila-doble">
        <div class="caja-gris">
            <h3 class="negrita color-azul"><i class="bi bi-water"></i> Lavado Premium</h3>
            <p>Utilizamos detergentes biodegradables que cuidan las fibras y el medio ambiente.</p>
        </div>
        <div class="caja-gris">
            <h3 class="negrita color-azul"><i class="bi bi-lightning-charge"></i> Entrega Express</h3>
            <p>¿Tienes prisa? Tu colada lista y doblada en menos de 24 horas.</p>
        </div>
    </div>

    <section class="my-5">
        <div class="caja-pack">
            <div class="info-pack" style="flex: 2;">
                <h2 class="negrita color-azul">🌟 Pack Especial Alfombras</h2>
                <p>Limpieza profunda con tratamiento anti-ácaros. ¡Tu alfombra como nueva!</p>
                <ul class="mt-3">
                    <li>Recogida y entrega gratuita en Alcobendas.</li>
                    <li>Tratamiento de manchas difíciles.</li>
                    <li>Desinfección total.</li>
                </ul>
            </div>
            <div class="precio-pack">
                <span>Desde</span>
                <span class="monto">25€</span>
                <p>por unidad</p>
                <a href="contactos.php" class="boton-reserva">Reservar Pack</a>
            </div>
        </div>
    </section>

    <h3 class="centrar-texto negrita color-azul mb-4">Lista de Precios Detallada</h3>
    <div class="borde-tabla">
        <table class="tabla-estilo-lavandi">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th class="centrar-texto">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // 2. Bucle para recorrer los servicios de la BD
                if(mysqli_num_rows($resultado) > 0):
                    while($row = mysqli_fetch_assoc($resultado)): 
                ?>
                    <tr>
                        <td class="negrita"><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td class="centrar-texto"><?php echo number_format($row['precio'], 2, ',', '.'); ?> €</td>
                    </tr>
                <?php 
                    endwhile; 
                else:
                ?>
                    <tr>
                        <td colspan="3" class="centrar-texto">No hay servicios disponibles actualmente.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include 'includes/footer.php'; ?>