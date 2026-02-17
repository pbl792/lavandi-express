<?php
session_start();

// Si ya está logueado, lo mandamos al index del admin
if(isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

include '../includes/db.php';

// --- LÓGICA DE PROCESAMIENTO ---
if(isset($_POST['btn_login'])) {
    
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password_ingresada = $_POST['password']; 

    $query = "SELECT id, nombre, password FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $query);

    if($row = mysqli_fetch_assoc($resultado)) {
        // SEGURIDAD DÍA 17: Comprobamos si el hash de la BD coincide con la clave escrita
        if(password_verify($password_ingresada, $row['password'])) {
            // ÉXITO
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_nombre'] = $row['nombre'];
            header("Location: index.php");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: login.php?error=1");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Lavandi Express</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body style="display:flex; align-items:center; justify-content:center; height:100vh; background:#f4f7f6;">

    <form action="login.php" method="POST" style="background:white; padding:40px; border-radius:15px; box-shadow:0 10px 25px rgba(0,0,0,0.1); width:350px;">
        <h2 style="text-align:center; color:var(--azul-lavandi); margin-bottom:20px;">Panel Admin</h2>
        
        <?php if(isset($_GET['error'])): ?>
            <p style="color:red; text-align:center; background: #fee; padding: 10px; border-radius: 5px; font-size: 0.9em;">
                Usuario o contraseña incorrectos
            </p>
        <?php endif; ?>

        <label style="display:block; margin-bottom:5px;">Email:</label>
        <input type="email" name="email" required style="width:100%; padding:10px; margin-bottom:20px; border:1px solid #ddd; border-radius:5px;">

        <label style="display:block; margin-bottom:5px;">Contraseña:</label>
        <input type="password" name="password" required style="width:100%; padding:10px; margin-bottom:20px; border:1px solid #ddd; border-radius:5px;">

        <button type="submit" name="btn_login" class="btn-lavandi boton-azul-relleno" style="width:100%; cursor:pointer;">Entrar</button>
    </form>

</body>
</html>