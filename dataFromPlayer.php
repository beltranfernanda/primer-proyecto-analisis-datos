<?php
    $idUser = $_GET["player"];
    $datas = file_get_contents("http://evalua.fernandoyepesc.com/04_Modules/11_Evalua/10_WS/ws_evalspereitem.php?uid=F1115&iid=" . $idUser . "&eid=40");
    $json_datas = json_decode($datas, true);
    echo json_encode($json_datas)
?>