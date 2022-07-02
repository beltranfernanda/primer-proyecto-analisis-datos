<?php

class Graph {

    private string $whatPlot = "";
    private string $howPlot = "";
    private string $graphName = "";
    private string $roundedCorners = "";
    private string $graphSpace = "";
    private string $dataResolution = "";
    private string $tabToFilter = "";
    private string $isPopupGraph = "";

    public function setWhatAndHowToPlot($whatAndHowPlot){
        $whatAndHowPlotExplode = explode(",", $whatAndHowPlot);
        $this->whatPlot = $whatAndHowPlotExplode[0];
        $this->howPlot = $whatAndHowPlotExplode[1];
    }

    public function setGraphName($name){
        $this->graphName = $name;
    }

    public function setRoundedCorners($corner){
        $this->roundedCorners = $corner;
    }

    public function setGraphAndTable($graphSpaceAndTable){
        $this->graphSpace = $graphSpaceAndTable;
    }
    
    public function setDataResolution($resolution){
        $this->graphSpace = $resolution;
    }

    public function setTab($tab){
        $this->tabToFilter = $tab;
    }

    public function setPopup($isPopup){
        $this->isPopupGraph = $isPopup;
    }

    public function getWhatPlot(){
        return $this->whatPlot;
    }

    public function getHowPlot(){
        return $this->howPlot;
    }

    public function getGraphName(){
        return $this->graphName;
    }

    public function getRoundedCorners(){
        return $this->roundedCorners;
    }

    public function getGraphAndTable(){
        return $this->graphSpace;
    }
    
    public function getDataResolution(){
        return $this->graphSpace;
    }

    public function getTab(){
        return $this->tabToFilter;
    }

    public function getPopup(){
        return $this->isPopupGraph;
    }
}
?>