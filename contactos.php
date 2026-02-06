<?php include 'includes/header.php'; ?>

<?php
/* LÓGICA DE PROCESAMIENTO DEL FORMULARIO
   Verifica si el formulario fue enviado vía POST.
*/
$enviado = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* TÉCNICA HONEYPOT (Anti-Spam Sencillo):
       El campo 'asunto-fake' está oculto por CSS (display:none).
       Los usuarios humanos no lo ven y no lo rellenan.
       Los bots de spam suelen rellenar todo.
       Si 'asunto-fake' NO está vacío, es un bot y no procesamos nada.
       Si está vacío, procesamos el formulario (aquí simulamos éxito con $enviado = true).
    */
    if (empty($_POST['asunto-fake'])) {
        $enviado = true;
    }
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

    <div style="max-width: 600px; margin: 0 auto; padding: 0 20px;">
        
        <?php if ($enviado): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 20px; border-radius: 10px; margin-bottom: 20px; text-align: center; border: 1px solid #c3e6cb;">
                <strong>¡Mensaje enviado con éxito!</strong><br>
                Nos pondremos en contacto contigo en menos de 24 horas.
            </div>
        <?php endif; ?>

        <form action="contactos.php" method="POST" class="formulario-contacto">
            
            <div style="display: none;">
                <input type="text" name="asunto-fake" value="">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="nombre" style="display: block; font-weight: bold; margin-bottom: 5px;">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="input-contacto" required 
                       pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]{3,}" 
                       title="Introduce al menos 3 letras." 
                       placeholder="Tu nombre completo">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
                <input type="text" id="email" name="email" class="input-contacto" required 
                       maxlength="200"
                       pattern="^[^@]+@[^@.]+\.[a-zA-Z]{2,}$" 
                       title="Formato requerido: usuario@a.es (Debe incluir @, al menos un carácter tras ella y un dominio final como .es o .com)" 
                       placeholder="ejemplo@a.es">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="mensaje" style="display: block; font-weight: bold; margin-bottom: 5px;">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="5" class="input-contacto" required 
                          minlength="10" placeholder="¿En qué podemos ayudarte?"></textarea>
            </div>

            <button type="submit" class="boton-azul-relleno" style="width: 100%; border: none; cursor: pointer;">
                Enviar Mensaje
            </button>
            
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>