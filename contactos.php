<?php include 'includes/header.php'; ?>

<?php
// Lógica para mostrar el mensaje de confirmación
$enviado = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enviado = true;
}
?>

<main class="contenedor-web" style="padding: 60px 20px;">
    <div class="centrar-texto mb-5">
        <h1 class="titulo-gigante color-azul">Contacta con nosotros</h1>
        <p>Estamos en Alcobendas para cuidar de tus prendas favoritas.</p>
    </div>

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