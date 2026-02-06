<?php include 'includes/header.php'; ?>

<section class="portada-principal">
    <div class="capa-oscura-portada">
        <div class="caja-texto-portada">
            <span class="negrita">Tu lavandería de confianza en Alcobendas</span>
            <h1 class="titulo-enorme">Ropa impecable,<br><span class="resaltado-amarillo">sin mover un dedo.</span></h1>
            <p>Recogemos tu colada a domicilio y te la entregamos limpia, seca y doblada en 24h.</p>
            <div class="grupo-botones">
                <a href="servicios.php" class="btn-lavandi boton-azul-relleno">Ver Precios</a>
                <a href="contactos.php" class="btn-lavandi boton-blanco-borde">Pedir Recogida</a>
            </div>
        </div>
    </div>
</section>

<section class="contenedor-web seccion-ventajas">
    <div class="lista-ventajas">
        <div class="bloque-ventaja">
            <div class="circulo-icono"><i class="bi bi-truck"></i></div>
            <h4 class="negrita">Envío Gratis</h4>
            <p>En pedidos superiores a 20€.</p>
        </div>
        <div class="bloque-ventaja">
            <div class="circulo-icono"><i class="bi bi-clock-history"></i></div>
            <h4 class="negrita">Express 24h</h4>
            <p>Tu ropa lista de un día para otro.</p>
        </div>
        <div class="bloque-ventaja">
            <div class="circulo-icono"><i class="bi bi-shield-check"></i></div>
            <h4 class="negrita">Garantía Total</h4>
            <p>Cuidamos tus prendas al detalle.</p>
        </div>
    </div>
</section>

<section class="seccion-gris-claro">
    <div class="contenedor-web">
        <h2 class="centrar-texto negrita mb-5" style="font-size: 2.5rem; color: var(--azul-lavandi);">Nuestros Servicios Top</h2>
        <div class="rejilla-servicios">
            <div class="tarjeta-servicio">
                <div class="contenedor-foto"><img src="img/lavado-seco.jpg" alt="Lavado Seco"></div>
                <div class="detalles-servicio">
                    <h3>Lavado en Seco</h3>
                    <p>Ideal para trajes, vestidos y prendas delicadas.</p>
                    <a href="servicios.php" class="link-mas-info">Saber más →</a>
                </div>
            </div>
            <div class="tarjeta-servicio">
                <div class="contenedor-foto"><img src="img/planchado.jpg" alt="Planchado"></div>
                <div class="detalles-servicio">
                    <h3>Planchado Pro</h3>
                    <p>Adiós a las arrugas. Entrega en percha o doblado.</p>
                    <a href="servicios.php" class="link-mas-info">Saber más →</a>
                </div>
            </div>
            <div class="tarjeta-servicio borde-especial">
                <div class="contenedor-foto"><img src="img/alfombra.jpg" alt="Alfombras"></div>
                <div class="detalles-servicio">
                    <h3>Pack Alfombras</h3>
                    <p>Limpieza profunda y desinfección total de alfombras.</p>
                    <a href="servicios.php" class="link-mas-info">Ver Oferta →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding: 60px 0; text-align: center;">
    <div class="contenedor-web">
        <h1 class="titulo-gigante titulo-gradiente">¿Dónde estamos?</h1>
        <div class="linea-decorativa"></div>
        
        <div style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin: 30px 0;">
            <iframe 
                width="100%" 
                height="450" 
                style="border:0;" 
                loading="lazy" 
                allowfullscreen 
                src="https://maps.google.com/maps?q=Tintoreria%20Lavandi%20Express,%20Av.%20de%20Camilo%20Jos%C3%A9%20Cela,%205,%2028100%20Alcobendas,%20Madrid&t=&z=17&ie=UTF8&iwloc=&output=embed">
            </iframe>
        </div>

        <p class="negrita" style="font-size: 1.2rem; color: var(--azul-oscuro);">
            Av. de Camilo José Cela, 5, 28100 Alcobendas, Madrid
        </p>
        
        <div class="grupo-botones">
            <a href="https://www.google.com/maps/dir//Tintoreria+Lavandi+Express,+Av.+de+Camilo+Jos%C3%A9+Cela,+5,+28100+Alcobendas,+Madrid" target="_blank" class="btn-lavandi boton-azul-relleno">
                Cómo llegar
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>