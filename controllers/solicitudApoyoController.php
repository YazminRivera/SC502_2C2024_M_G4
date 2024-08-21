<?php
require_once '../models/SolicitudApoyoModel.php';
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : "";
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "";
    $detalleRescate = (isset($_POST['detalleRescate'])) ? $_POST['detalleRescate'] : "";
    $detalleAnimal = (isset($_POST['detalleAnimal'])) ? $_POST['detalleAnimal'] : "";
    $ubicacion = (isset($_POST['ubicacion'])) ? $_POST['ubicacion'] : "";
    $solicitudApoyo = new SolicitudApoyoModel();
    $solicitudApoyo->setNombre($nombre);
    $solicitudApoyo->setApellidos($apellidos);
    $solicitudApoyo->setCorreo($correo);
    $solicitudApoyo->setTelefono($telefono);
    $solicitudApoyo->setDetalleRescate($detalleRescate);
    $solicitudApoyo->setDetalleAnimal($detalleAnimal);
    $solicitudApoyo->setUbicacion($ubicacion);
    $solicitudApoyo->setEstado($estado);
    $solicitudApoyo->solicitudApoyo();
?>