<?php
include ('GraphBuilder.php');

class GaussBellBuilder implements GraphBuilder {

    private $graph;

    public function setGraph($graph){
        $this->graph = $graph;
    }

    public function showGraph(){
        echo '<div class="card">
            <div class="card-body">
                <h5 class="card-title">Campana de Gauss</h5>
                <canvas id="campanaGauss"></canvas>
                <p id="textOfCampanaGauss" class="card-text">Gauss bell</p>
            </div>
        </div>';
    }
}

?>