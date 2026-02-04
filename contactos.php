<?php include 'includes/header.php'; ?>

<?php
$enviado = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") { $enviado = true; }
?>

<main class="contenedor-web seccion-padding">
    <section class="seccion-contacto">
        <span class="badge rounded-pill bg-info text-dark px-3 py-2 mb-3">Hablemos</span>
        <h1 class="titulo-gradiente">¿Cómo podemos ayudarte?</h1>
        <div class="linea-decorativa"></div>
        <p class="texto-destacado">Envíanos un mensaje y te responderemos pronto</p>
    </section>

    <div style="max-width: 600px; margin: 0 auto;">
        <?php if ($enviado): ?>
            <div class="alert alert-success text-center">
                <strong>¡Mensaje enviado con éxito!</strong><br>
                Nos pondremos en contacto contigo en menos de 24 horas.
            </div>
        <?php endif; ?>

        <form action="contactos.php" method="POST" class="formulario-contacto">
            <div class="mb-3">
                <label for="nombre" class="negrita">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="input-contacto" required placeholder="Tu nombre completo">
            </div>
            <div class="mb-3">
                <label for="email" class="negrita">Email</label>
                <input type="email" id="email" name="email" class="input-contacto" required placeholder="ejemplo@correo.com">
            </div>
            <div class="mb-3">
                <label for="mensaje" class="negrita">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="5" class="input-contacto" required placeholder="¿En qué podemos ayudarte?"></textarea>
            </div>
            <button type="submit" class="btn-lavandi boton-azul-relleno" style="width: 100%;">Enviar Mensaje</button>
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>