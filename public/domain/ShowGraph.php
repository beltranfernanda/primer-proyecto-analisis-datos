<?php
include ('Data.php');
include( 'public/infraestructure/googleCharts/GoogChart.class.php');

class ShowGraph {

    private $graph; //type Graph.php
    private $chart;
    private $data;
    private $color;
    private $grid; //columns
    const TOTAL_SPACE = 12;

    public function setGraph($graph){
        $this->graph = $graph;
    }

    public function setGrid($grid){
        $this->grid = $grid;
    }

    private function initVariables(){
        $this->chart = new GoogChart();
        $this->data = new Data;
        $this->color = array(
            '#99C754',
            '#54C7C5',
            '#999999',
        );
    }

    public function showGraph($type){
        $jsonDataService = $GLOBALS['jsonDataService'];

        $this->initVariables();
        $dataContent = $this->data->getData(intval($this->graph->getWhatPlot())-1);

        if($this->graph->getGraphAndTable() > 8 || $this->grid > 2){
            $this->graphWhenNotShowTable($type, $dataContent);
        } else if ($this->graph->getGraphAndTable() <= 8){
            $this->graphWhenIsTable($type, $dataContent);
        } 
    }

    private function calculateRestSpace(int $graphSpace){
        return self::TOTAL_SPACE - $graphSpace;
    }

    private function graphWhenNotShowTable($_type, $_dataContent){
        $this->chart->setChartAttrs( array(
        'type' => $_type,
        'title' => $this->graph->getGraphName(),
        'data' => $_dataContent,
        'size' => array( 400, 300 ),
        'color' => $this->color
        ));
        $border = $this->graph->getRoundedCorners() == '1' ? 'rounded-10' : '';
        //$width = 100 / $this->grid;
        $width = 'auto';
            echo '<article  class="chart-card-container" style="width: '.$width.'%;">';
            echo '<div class="chart-card bg-white border '.$border.'">';
                echo '<div class="row chart-card--with-table">';
                    echo '<div class="col-md-'.$this->graph->getGraphAndTable().'">';
                        echo '<h2 class="chart-card__title">'.$this->graph->getGraphName().'</h2>';
                        echo '<div class="chart">';
                            echo $this->chart;
                        echo '</div>';
                    echo '</div>';
                    echo '<div class=" table-container col-md-'.$this->calculateRestSpace($this->graph->getGraphAndTable()).'">';
                        $this->showTable($_dataContent);
                    echo '</div>';
                    
                    $i = 0;
                    echo '<div>Data resolution</div>';
                    foreach ($_dataContent as $valores=>$value){
                        echo '<div style="width:auto">'. number_format($value, $this->graph->getDataResolution()) . ' ' .'</div>';
                        $i++;
                    }
                echo '</div>';
            echo '</div>';
            echo '</article>';
    }

    private function graphWhenIsTable($_type, $_dataContent){
        $this->chart->setChartAttrs( array(
        'type' => $_type,
        'title' => $this->graph->getGraphName(),
        'data' => $_dataContent,
        'size' => array( 400, 300 ),
        'color' => $this->color
        ));
        $border = $this->graph->getRoundedCorners() == '1' ? 'rounded-10' : '';
        //$width = 100 / $this->grid;
        $width = 'auto';
            echo '<article  class="chart-card-container" style="width: '.$width.'%;">';
            echo '<div class="chart-card bg-white border '.$border.'">';
                echo '<div class="row chart-card--with-table">';
                    echo '<div class="col-md-'.$this->graph->getGraphAndTable().'">';
                        echo '<h2 class="chart-card__title">'.$this->graph->getGraphName().'</h2>';
                        echo '<div class="chart">';
                            echo $this->chart;
                        echo '</div>';
                    echo '</div>';
                    echo '<div class=" table-container col-md-'.$this->calculateRestSpace($this->graph->getGraphAndTable()).'">';
                        $this->showTable($_dataContent);
                    echo '</div>';
                    
                    $i = 0;
                    echo '<div>Data resolution</div>';
                    foreach ($_dataContent as $valores=>$value){
                        echo '<div style="width:auto">'. number_format($value, $this->graph->getDataResolution()) . ' ' .'</div>';
                        $i++;
                    }
                echo '</div>';
            echo '</div>';
            echo '</article>';
    }

    private function showTable($_dataContent){
        $array_keys = array_keys($_dataContent);
        $array_data_size = count($array_keys);
        echo '<table class="table table-responsive">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col"> # </th>';
                    echo '<th scope="col">'.$this->graph->getGraphName().'</th>';
                echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
                for($i = 0; $i < $array_data_size; $i++){
                    echo '<tr>';
                        echo '<th scope="row">'.$i.'</th>';
                        echo '<td>'.$array_keys[$i].'</td>';
                    echo '</tr>';
                }
            echo '</tbody>';
        echo '</table>';
    }
}