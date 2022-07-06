<?php
 
include ('Graph.php');
include ('GaussBellBuilder.php');

class GraphForType {

    const GAUSS_BELL = "1";
    const HISTOGRAM = "2";
    const PIE = "3";
    const BAR = "4";

    public function setGuildingStructure($guildingStructure){
        $grid = $guildingStructure['grid'];
        $tab = $guildingStructure['tab'];
        $isPopupGraph = $guildingStructure['Popup'];

        $what_and_how_to_plot = explode("|", $guildingStructure['what_and_how_to_plot']);
        $graph_names = explode("|", $guildingStructure['graph_names']);
        $rounded_corners = explode("|", $guildingStructure['rounded_corners']);
        $data_resolution = explode("|", $guildingStructure['data_resolution']);
        $tab = explode("|", $guildingStructure['tab']);

        $array_num = count($what_and_how_to_plot);
        $graphs = array();
        for ($i = 0; $i < $array_num; ++$i) {
            $graph = new Graph;
            $graph->setWhatAndHowToPlot($what_and_how_to_plot[$i]);
            $graph->setGraphName($graph_names[$i]);
            $graph->setRoundedCorners($rounded_corners[$i]);
            $graph->setGraphAndTable($data_resolution[$i]);
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
                case self::PIE:
                    echo "PIE";
                    echo "<br>";
                    break;
                case self::BAR:
                    echo "BAR";
                    echo "<br>";
                    break;
            }
        }
    }

    public function showGrid($graps){
        '<div class="card">
            <div class="card-body">
                $graps
            </div>
        </div>'
    }
}


?>