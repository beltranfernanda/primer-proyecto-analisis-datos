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
    private $columns =0;


    public function setGuildingStructure($guildingStructureJson){
        $grid = explode("x", $guildingStructureJson[0]['grid']);
        $this->fila = intval($grid[0]);
        $this->columns = intval($grid[1]);

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
        $array_num2 = count($this->graphsForType);
        
        echo '<ul class="nav nav-tabs" id="myTab" role="tablist">';
        for ($i = 0; $i < $array_num; $i++){
            echo '<li class="nav-item" role="presentation">';
            if($i == 0){
                echo '<button class="nav-link active" id="pillstab'.$i.'" data-bs-toggle="pill" data-bs-target="#tab'.$i.'" type="button" role="tab" aria-controls="tab'.$i.'" aria-selected="true">'.$this->graphsForType[$i]->getTab().'</button>';
            }else{
                echo '<button class="nav-link" id="pills-tab'.$i.'" data-bs-toggle="pill" data-bs-target="#tab'.$i.'" type="button" role="tab" aria-controls="tab'.$i.'" aria-selected="false">'.$this->graphsForType[$i]->getTab().'</button>';
            }
            echo '</li>';
        }
        echo '</ul>';


        echo '<div class="tab-content" id="myTabContent">';
        for ($j = 0; $j < $array_num2; $j++){
            if($j == 0){
                echo '<div class="tab-pane fade show active" id="tab'.$j.'" role="tabpanel" aria-labelledby="tab'.$j.'">';
            }else{
                echo '<div class="tab-pane fade" id="tab'.$j.'" role="tabpanel" aria-labelledby="tab'.$j.'">';
            }
            $this->showGraphs($this->graphsForType[$j]->getGraphs());
            echo '</div>';
        }
        echo '</div>';
    }

    private function showGraphs($graphs){
        $array_num = count($graphs);
        for ($i = 0; $i < $array_num; $i++){
            $showGraph = new ShowGraph;
            $showGraph->setGrid($this->columns);
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