<?php
require_once '../models/SolicitudApoyoModel.php';

$solicitudApoyo = new SolicitudApoyoModel();
$solicitudes = $solicitudApoyo->listarSolicitudes();
?>