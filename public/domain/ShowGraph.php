<?php
include ('Data.php');
include( 'public/infraestructure/googleCharts/GoogChart.class.php');

class ShowGraph {

    private $graph;

    public function setGraph($graph){
        $this->graph = $graph;
    }

    public function showGraph($type){
        $jsonDataService = $GLOBALS['jsonDataService'];

        
        $data = new Data;
        $chart = new GoogChart();

        $color = array(
            '#99C754',
            '#54C7C5',
            '#999999',
        );

        echo '<div class="card-body">';
        echo '<h2>'.$this->graph->getGraphName().'</h2>';
        $chart->setChartAttrs( array(
            'type' => $type,
            'title' => $this->graph->getGraphName(),
            'data' => $data->getData(intval($this->graph->getWhatPlot())-1),
            'size' => array( 400, 300 ),
            'color' => $color
            ));

        echo $chart;
        echo '</div>';
    }
}

?>