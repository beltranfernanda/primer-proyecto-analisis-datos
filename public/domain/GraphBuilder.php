<?php
interface GraphBuilder{
    public function setWhatToPlot($what) //Información que se va a graficar. Ejemplo información de las edades
    public function setHowToPlot($how) //Información de como se va a graficar, en torta, barras, etc ...
    public function setGraphName($name)
    public function setRoundedCorners($corner)
    public function setGraphAndTable($graphSpace) //Se ingresa el espacio que va a tener la grafica y el espacio restante lo toma la tabla
    public function setDataResolution($resolution) //El valor de cada punto por ejemplo se ingresa 1, entonces se mostraria una valor 0.1
    public function setTab($tab) //Es la etiqueta que tendra, para poder filtrar por tipo de grafica
    public function setPopup($isPopup) //Abre un popup de la grafica
}
?>