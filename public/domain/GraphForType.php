<?php
 
include ('Graph.php');
include ('GaussBellBuilder.php');

class GraphForType {

    const GAUSS_BELL = "1";
    const HISTOGRAM = "2";
    const LATERALIDAD = "3";
    const CAKE = "4";

    public function setGuildingStructure($guildingStructure){
        $grid = $guildingStructure['grid'];

        $what_and_how_to_plot = explode("|", $guildingStructure['what_and_how_to_plot']);
        $graph_names = explode("|", $guildingStructure['graph_names']);
        $rounded_corners = explode("|", $guildingStructure['rounded_corners']);
        $data_resolution = explode("|", $guildingStructure['data_resolution']);
        $tab = explode("|", $guildingStructure['tab']);
        $Popup = explode("|", $guildingStructure['Popup']);

        $array_num = count($what_and_how_to_plot);
        $graphs = array();
        for ($i = 0; $i < $array_num; ++$i){
            $graph = new Graph;
            $graph->setWhatAndHowToPlot($what_and_how_to_plot[$i]);
            $graph->setGraphName($graph_names[$i]);
            $graph->setRoundedCorners($rounded_corners[$i]);
            $graph->setGraphAndTable($data_resolution[$i]);
            $graph->setTab($tab[$i]);
            $graph->setPopup($Popup[$i]);
            $graphs[$i] = $graph;
        }

        
        $array_num = count($graphs);
        for ($i = 0; $i < $array_num; ++$i){
            switch ($graphs[$i]->getWhatPlot()) {
                case self::GAUSS_BELL:
                    $gaussBellBuilder = new GaussBellBuilder;
                    $gaussBellBuilder->setGraph($graphs[$i]);
                    $gaussBellBuilder->showGraph();
                    break;
                case self::HISTOGRAM:
                    echo "HISTOGRAM";
                    echo "<br>";
                    break;
                case self::LATERALIDAD:
                    echo "LATERALIDAD";
                    echo "<br>";
                    break;
                case self::CAKE:
                    echo "CAKE";
                    echo "<br>";
                    break;
            }
        }
    }
}


?>