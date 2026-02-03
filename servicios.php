<?php include 'includes/header.php'; ?>

<main class="contenedor">
    <h1 class="titulo-centrado color-azul">Nuestros Servicios y Tarifas</h1>

    <div class="fila-doble">
        <div class="caja-gris">
            <h3 class="nombre-servicio"><i class="bi bi-water"></i> Lavado Premium</h3>
            <p>Utilizamos detergentes biodegradables que cuidan las fibras y el medio ambiente.</p>
        </div>
        <div class="caja-gris">
            <h3 class="nombre-servicio"><i class="bi bi-lightning-charge"></i> Entrega Express</h3>
            <p>¿Tienes prisa? Tu colada lista y doblada en menos de 24 horas.</p>
        </div>
    </div>

    <section class="seccion-especial">
        <div class="caja-pack">
            <div class="info-pack">
                <h2 class="titulo-pack">🌟 Pack Especial Alfombras</h2>
                <p>Limpieza profunda con tratamiento anti-ácaros y secado controlado para evitar humedad. ¡Tu alfombra como nueva!</p>
                <ul class="lista-ventajas">
                    <li>Recogida y entrega gratuita en Alcobendas.</li>
                    <li>Tratamiento de manchas difíciles incluido.</li>
                    <li>Desinfección total y aroma fresco.</li>
                </ul>
            </div>
            <div class="precio-pack">
                <span class="desde">Desde</span>
                <span class="monto">25€</span>
                <p class="unidad">por unidad</p>
                <a href="contactos.php" class="boton-accion">Reservar Pack</a>
            </div>
        </div>
    </section>

    <h2 class="subtitulo">Lista de Precios Detallada</h2>
    
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
                <tr>
                    <td class="negrita">Colada Estándar</td>
                    <td>Lavado + Secado hasta 8kg.</td>
                    <td class="centrar-texto">9,00 €</td>
                </tr>
                <tr>
                    <td class="negrita">Edredones</td>
                    <td>Lavado especial para piezas voluminosas.</td>
                    <td class="centrar-texto">15,50 €</td>
                </tr>
                <tr>
                    <td class="negrita">Trajes</td>
                    <td>Limpieza en seco y planchado a vapor.</td>
                    <td class="centrar-texto">12,00 €</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php include 'includes/footer.php'; ?>