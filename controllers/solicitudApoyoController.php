<?php
require_once '../models/SolicitudApoyoModel.php';
    $idUsuario = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : "";
    $detalleRescate = (isset($_POST['detalleRescate'])) ? $_POST['detalleRescate'] : "";
    $detalleAnimal = (isset($_POST['detalleAnimal'])) ? $_POST['detalleAnimal'] : "";
    $userLatitude = (isset($_POST['userLatitude'])) ? $_POST['userLatitude'] : "";
    $userLongitude = (isset($_POST['userLongitude'])) ? $_POST['userLongitude'] : "";
    $solicitudApoyo = new SolicitudApoyoModel();
    $solicitudApoyo->setIdUsuario($idUsuario);
    $solicitudApoyo->setDetalleRescate($detalleRescate);
    $solicitudApoyo->setDetalleAnimal($detalleAnimal);
    $solicitudApoyo->setUserLatitude($userLatitude);
    $solicitudApoyo->setUserLongitude($userLongitude);
    $solicitudApoyo->solicitudApoyo();
?>