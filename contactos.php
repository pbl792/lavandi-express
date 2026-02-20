<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; // Conexión a la BD ?>

<?php
$enviado = false;
$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* TÉCNICA HONEYPOT */
    if (empty($_POST['asunto-fake'])) {
        
        // 1. Capturar y Limpiar datos (trim quita espacios en blanco)
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $mensaje = trim($_POST['mensaje']);
        $asunto = "Consulta desde formulario Web";

        // 2. VALIDACIONES DEL SERVIDOR (Seguridad Día 17)
        if (empty($nombre) || strlen($nombre) < 3) {
            $errores[] = "El nombre debe tener al menos 3 caracteres.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Por favor, introduce un email válido.";
        }

        if (empty($mensaje) || strlen($mensaje) < 10) {
            $errores[] = "El mensaje es demasiado corto (mínimo 10 caracteres).";
        }

        // 3. Si no hay errores, procedemos a guardar
        if (empty($errores)) {
            $nombre_db = mysqli_real_escape_string($conexion, $nombre);
            $email_db = mysqli_real_escape_string($conexion, $email);
            $mensaje_db = mysqli_real_escape_string($conexion, $mensaje);

            $query = "INSERT INTO mensajes (nombre, email, asunto, mensaje, leido) 
                      VALUES ('$nombre_db', '$email_db', '$asunto', '$mensaje_db', 0)";
            
            if (mysqli_query($conexion, $query)) {
                $enviado = true;
            } else {
                $errores[] = "Error interno del servidor. Inténtalo más tarde.";
            }
        }
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

        <?php if (!empty($errores)): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 20px; border-radius: 10px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <ul style="margin: 0; padding-left: 20px;">
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
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
                       placeholder="Tu nombre completo"
                       value="<?php echo isset($_POST['nombre']) && !$enviado ? htmlspecialchars($_POST['nombre']) : ''; ?>">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
                <input type="text" id="email" name="email" class="input-contacto" required 
                       maxlength="200"
                       pattern="^[^@]+@[^@.]+\.[a-zA-Z]{2,}$" 
                       title="Formato requerido: usuario@a.es" 
                       placeholder="ejemplo@a.es"
                       value="<?php echo isset($_POST['email']) && !$enviado ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="mensaje" style="display: block; font-weight: bold; margin-bottom: 5px;">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="5" class="input-contacto" required 
                          minlength="10" placeholder="¿En qué podemos ayudarte?"><?php echo isset($_POST['mensaje']) && !$enviado ? htmlspecialchars($_POST['mensaje']) : ''; ?></textarea>
            </div>

            <button type="submit" class="boton-azul-relleno" style="width: 100%; border: none; cursor: pointer;">
                Enviar Mensaje
            </button>
            
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>