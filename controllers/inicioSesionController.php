<?php
require_once '../models/inicioSesionModel.php';
session_start();

$correo = $_POST['correo'] ?? "";
$contrasena = $_POST['contrasena'] ?? "";

$inicio = new InicioSesionModel();
$inicio->setCorreo($correo);
$inicio->setContrasena($contrasena);

if (!$inicio->Existencia()) {
    echo 2; 
} else {
    $usuario = $inicio->iniciarSesion(); 
    if ($usuario) {
        $_SESSION['user'] = [
            'idUsuario' => $usuario->idUsuario,
            'nombre' => $usuario->nombre,
            'apellidos' => $usuario->apellidos,
            'correo' => $usuario->correo,
            'telefono' => $usuario->telefono,
            'rol' => $usuario->rol,
            'estado' => $usuario->estado,
        ];
        echo 1; 
    } else {
        echo 3; 
    }
}
?>
