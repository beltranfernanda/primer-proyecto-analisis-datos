<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="./public/css/style.css">
  </head>
  <body>

    <h1>Grupo 2</h1>

    <?php

    echo "This is our testing server grupo 2<br>";

    $data = file_get_contents("http://evalua.fernandoyepesc.com/04_Modules/11_Evalua/10_WS/ws_evitems.php?&eboxid=89");

    $json_data = json_decode($data, true);
    print_r($json_data[0]['id']);

    ?>
    <figure class="highcharts-figure">
      <div id="container"></div>
      
      <p class="highcharts-description">
        This pie chart shows how the chart legend can be used to provide
        information about the individual slices.
      </p>
    </figure>

  </body>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="./public/js/index.js"></script>
</html>