<?php

include ('Graph.php');

class GuildingStructure {
    
    private string $grid = "";
    private string $tab = "";
    private string $isPopupGraph = "";
    private $graphs = array();

    public function setGrid($grid) {
        $this->grid = $grid;
    }

    public function setTab($tab) {
        $this->tab = $tab;
    }

    public function setIsPopupGraph($isPopupGraph) {
        $this->isPopupGraph = $isPopupGraph;
    }

    public function setGraph($guildingStructureJson) {
        $what_and_how_to_plot = explode("|", $guildingStructureJson['what_and_how_to_plot']);
        $graph_names = explode("|", $guildingStructureJson['graph_names']);
        $rounded_corners = explode("|", $guildingStructureJson['rounded_corners']);
        $data_resolution = explode("|", $guildingStructureJson['data_resolution']);
        $tab = explode("|", $guildingStructureJson['tab']);
        $graphSpace = explode("|", $guildingStructureJson['graph_and_table_space']);

        $array_num = count($what_and_how_to_plot);
        for ($i = 0; $i < $array_num; $i++) {
            $graph = new Graph;
            $graph->setWhatAndHowToPlot($what_and_how_to_plot[$i]);
            $graph->setGraphName($graph_names[$i]);
            $graph->setRoundedCorners($rounded_corners[$i]);
            $graph->setGraphAndTable($graphSpace[$i]);
            $this->graphs[$i] = $graph;
        }
    }

    public function getGrid(){
        return $this->grid;
    }

    public function getTab(){
        return $this->tab;
    }

    public function getIsPopupGraph(){
        return $this->isPopupGraph;
    }
    
    public function getGraphs(){
        return $this->graphs;
    }
}

?>