<?php
require_once '../models/SolicitudApoyoModel.php';

// datos del formulario
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
$correo = isset($_POST['correo']) ? $_POST['correo'] : "";
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$detalleRescate = isset($_POST['detalleRescate']) ? $_POST['detalleRescate'] : "";
$detalleAnimal = isset($_POST['detalleAnimal']) ? $_POST['detalleAnimal'] : "";
$userLatitude = isset($_POST['latitud']) ? $_POST['latitud'] : "";
$userLongitude = isset($_POST['longitud']) ? $_POST['longitud'] : "";

$solicitudApoyo = new SolicitudApoyoModel();
$solicitudApoyo->setNombre($nombre);
$solicitudApoyo->setApellidos($apellidos);
$solicitudApoyo->setCorreo($correo);
$solicitudApoyo->setTelefono($telefono);
$solicitudApoyo->setDetalleRescate($detalleRescate);
$solicitudApoyo->setDetalleAnimal($detalleAnimal);
$solicitudApoyo->setUserLatitude($userLatitude);
$solicitudApoyo->setUserLongitude($userLongitude);
$solicitudApoyo->solicitudApoyo();
