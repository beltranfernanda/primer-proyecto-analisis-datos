<?php
include ('Data.php');
include( 'public/infraestructure/googleCharts/GoogChart.class.php');

class ShowGraph {

    private $graph;
    private $chart;
    private $data;
    private $color;
    const TOTAL_SPACE = 12;

    public function setGraph($graph){
        $this->graph = $graph;
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

        if($this->graph->getGraphAndTable() > 8){
            $this->graphWhenNotShowTable($type, $dataContent);
        } else if ($this->graph->getGraphAndTable() <= 8){
            $this->graphWhenIsTable($type, $dataContent);
        }
    }

    private function calculateRestSpace(int $graphSpace){
        return self::TOTAL_SPACE - $graphSpace;
    }

    private function graphWhenNotShowTable($_type, $_dataContent){
        echo '<div class="card-body centrar">';
            echo '<h2>'.$this->graph->getGraphName().'</h2>';
            $this->chart->setChartAttrs( array(
                'type' => $_type,
                'title' => $this->graph->getGraphName(),
                'data' => $_dataContent,
                'size' => array( 400, 300 ),
                'color' => $this->color
                ));

            echo $this->chart;
        echo '</div>';
    }

    private function graphWhenIsTable($_type, $_dataContent){
        echo '<div class="card-body centrar">';
            echo '<div class="row">';
                echo '<div class="col-md-'.$this->graph->getGraphAndTable().'">';
                    echo '<h2>'.$this->graph->getGraphName().'</h2>';
                        $this->chart->setChartAttrs( array(
                        'type' => $_type,
                        'title' => $this->graph->getGraphName(),
                        'data' => $_dataContent,
                        'size' => array( 400, 300 ),
                        'color' => $this->color
                        ));

                        echo $this->chart;
                echo '</div>';
                echo '<div class="col-md-'.$this->calculateRestSpace($this->graph->getGraphAndTable()).'">';
                    $this->showTable($_dataContent);
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }

    private function showTable($_dataContent){
        $array_keys = array_keys($_dataContent);
        $array_data_size = count($array_keys);

        echo '<table class="table table-striped">';
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

?>