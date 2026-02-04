<?php include 'includes/header.php'; ?>

<?php
$enviado = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enviado = true;
}
?>

<main class="contenedor-web" style="padding-bottom: 15px;">
    
    <section class="centrar-todo" style="padding: 40px 0 20px 0; text-align: center;">
        <div style="padding: 0 10px;">
            <h1 class="titulo-gigante titulo-gradiente" style="margin-bottom: 0;">¿Cómo podemos ayudarte?</h1>
        </div>
        
        <div class="linea-decorativa"></div>
        
        <p class="texto-destacado mt-3">Envíanos un mensaje y te responderemos tan pronto como podamos</p>
    </section>

    <div style="max-width: 600px; margin: 0 auto;">
        
        <?php if ($enviado): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 20px; border-radius: 10px; margin-bottom: 20px; text-align: center; border: 1px solid #c3e6cb;">
                <strong>¡Mensaje enviado con éxito!</strong><br>
                Nos pondremos en contacto contigo en menos de 24 horas.
            </div>
        <?php endif; ?>

        <form action="contactos.php" method="POST" class="formulario-contacto">
            
            <div style="margin-bottom: 20px;">
                <label for="nombre" style="display: block; font-weight: bold; margin-bottom: 5px;">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="input-contacto" required placeholder="Tu nombre completo">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
                <input type="email" id="email" name="email" class="input-contacto" required placeholder="ejemplo@correo.com">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="mensaje" style="display: block; font-weight: bold; margin-bottom: 5px;">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="5" class="input-contacto" required placeholder="¿En qué podemos ayudarte?"></textarea>
            </div>

            <button type="submit" class="boton-azul-relleno" style="width: 100%; border: none; cursor: pointer;">
                Enviar Mensaje
            </button>
            
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>