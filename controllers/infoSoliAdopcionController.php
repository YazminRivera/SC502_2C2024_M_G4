<?php
require_once '../models/infoSoliAdopcionModel.php';
    $user_login = new infoSoliAdopcionModel();
    $usuarios = $user_login->listarSolis();
    $data = array(); 
    foreach($usuarios as $reg){
        $data[] = array(
            "0" => $reg->getIdSoli(),
            "1" => $reg->getIdAnimal(),
            "2" => $reg->getIdUsuario(),
            "3" => $reg->getNombre(),
            "4" => $reg->getCorreo(),
            "5" => $reg->getDireccion(),
            "6" => $reg->getTelefono(),
        );
    }
    $resultados = array(
                "sEcho" => 1, ##informacion para datatables
                "iTotalRecords" =>count($data), ## total de registros al datatable
                "iTotalDisplayRecords" => count($data), ## enviamos el total de registros a visualizar
                "aaData" => $data
    );
    echo json_encode($resultados);
?>