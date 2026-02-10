<?php
// Configuración de la base de datos
$servidor = "localhost";
$usuario  = "root";
$password = "";
$base_datos = "lavandi_db"; // Asegúrate de que coincida con el nombre en tu archivo .sql

// Crear la conexión
$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);

// Verificar si la conexión falló
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Configurar el juego de caracteres a UTF-8 para evitar problemas con tildes y ñ
mysqli_set_charset($conexion, "utf8");
?>