<?php
 
include ('GuildingStructure.php');
include ('ShowGraph.php');

class GraphForType {

    const GAUSS_BELL = "1";
    const HISTOGRAM = "2";
    const PIE = "3";
    const LINE = "4";
    const BARHORIZONTAL = "5";
    const BARVERTICAL = "6";
    const SPARKLINE = "7";

    private $graphsForType = array();
    public $fila = 0;


    public function setGuildingStructure($guildingStructureJson){
        $grid = explode("x", $guildingStructureJson[0]['grid']);
        $this->fila = intval($grid[0]);
        
        $array_num = count($guildingStructureJson);
        for ($i = 0; $i < $array_num; $i++){
            $guildingStructure = new GuildingStructure;
            $guildingStructure->setGrid($guildingStructureJson[$i]['grid']);
            $guildingStructure->setTab($guildingStructureJson[$i]['tab']);
            $guildingStructure->setIsPopupGraph($guildingStructureJson[$i]['Popup']);
            $guildingStructure->setGraph($guildingStructureJson[$i]);
            $this->graphsForType[$i] = $guildingStructure;
        }
    }

    public function showGraphsForType(){
        $array_num = count($this->graphsForType);
        for ($i = 0; $i < $array_num; $i++){
            $this->showGraphs($this->graphsForType[$i]->getGraphs());
        }
    }

    private function showGraphs($graphs){
        $array_num = count($graphs);
        for ($i = 0; $i < $array_num; $i++){
            $showGraph = new ShowGraph;
            $showGraph->setGraph($graphs[$i]);
            switch ($graphs[$i]->getHowPlot()) {
                case self::GAUSS_BELL:
                    echo "GAUSS_BELL";
                    echo "<br>";
                    break;
                case self::HISTOGRAM:
                    echo "HISTOGRAM";
                    echo "<br>";
                    break;
                case self::PIE:
                    $showGraph->showGraph('pie'); 
                    break;
                case self::LINE:
                    $showGraph->showGraph('line');
                    break;
                case self::BARHORIZONTAL:
                    $showGraph->showGraph('bar-horizontal');
                    break;
               case self::BARVERTICAL:
                    $showGraph->showGraph('bar-vertical');
                    break;
               case self::SPARKLINE:
                    $showGraph->showGraph('sparkline');
                    break; 
            }
        }
    }
}
?>