<?php
class Data{

    public function getData($whatData){
        $jsonDataService = $GLOBALS['jsonDataService'];
        $values = array();
        $i = 0;
        foreach ($jsonDataService as $valores=>$value){
            if(isset($value['valores'][$whatData]['value'])){
                $data = $value['valores'][$whatData]['value'];
            }
            if($data != null){
                $values[$i] = $data;
                $i++;
            }
        }

        $data = array_count_values($values);

        print_r($data);
        
        return $data;
    }
    
}
?>