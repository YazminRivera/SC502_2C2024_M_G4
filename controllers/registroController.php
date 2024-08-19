<?php
require_once '../models/RegistroModel.php';

switch ($_GET["op"]) {
    case 'insertar':
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
        $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : "";
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
        $contrasena = (isset($_POST['contrasena'])) ? $_POST['contrasena'] : "";
        $rol = (isset($_POST['rol'])) ? $_POST['rol'] : "";
        $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "";
        $registro = new RegistroModel();
        $registro->setCorreo($correo);
        $encontrado = $registro->Existencia();
        if ($encontrado == false) {
            $registro->setNombre($nombre);
            $registro->setApellidos($apellidos);
            $registro->setCorreo($correo);
            $registro->setTelefono($telefono);
            $registro->setContrasena($contrasena);
            $registro->setRol($rol);
            $registro->setEstado($estado);
            $registro->registrar();
            if ($registro->Existencia()) {
                echo 1;
            } else {
                echo 3;
            }
        } else {
            echo 2;
        }
    break; 
    
}

?>