<?php

#Inicializacion de la sesion
session_start();

// Conectar con la base de datos
$db = new mysqli('localhost', 'root', '', 'tiendaGamer');
if ($db->connect_error) {
	die('Error de conexión con la base de datos: '  . $db->connect_error);
}
// Recibir datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consultar la base de datos para verificar las credenciales
$sql = "SELECT * FROM user
	WHERE username = '$username' AND  password  = MD5('$password')";
$result = $db->query($sql);

if ($result->num_rows > 0) {
	// Inicio de sesión exitoso
	$_SESSION['username'] = $username;
	header('Location:bienvenido.php');
} else {
	// Inicio de sesión fallido
	echo 'Usuario o contraseña incorrectos.';
}
$db->close();
?>