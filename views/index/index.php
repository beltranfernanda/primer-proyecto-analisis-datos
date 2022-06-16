<?php
    $data = file_get_contents("http://evalua.fernandoyepesc.com/04_Modules/11_Evalua/10_WS/ws_evitems.php?&eboxid=89");
    $json_data = json_decode($data, true);
    echo json_encode($json_data)
    //print_r($json_data);
?>