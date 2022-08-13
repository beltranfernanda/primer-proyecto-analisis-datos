<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
  </head>
  <body class="bg-light">
    <?php require 'views/navbar/navbar.php'; ?>
    <?php 
      include ('utils/csvParser.php');
      $data = CsvParser::readCsv("02_CronogramActs-b.csv");
      // var_dump($data);
      print_r($data);
    ?>
    <div class="container my-3">
      <h2 class="display-4">Chronogram of activities</h2>
      <!-- Inicio primera fila-->
      <div class="row my-3">
        <!-- Inicio primer columna-->
        <div class="col">
          <?php require 'views/programmedGantt/programmedGantt.php'; ?>
        </div>
      </div>
      <!-- Inicio segunda fila-->
      <div class="row my-3">
        <!-- Inicio primer columna-->
        <div class="col">
          <?php require 'views/realGantt/realGantt.php'; ?>
        </div>
      </div>
    </div>
  </body>
  <script>
    const responseService = <?php
      $data = file_get_contents("http://evalua.fernandoyepesc.com/04_Modules/11_Evalua/10_WS/ws_evitems.php?&eboxid=89");
      $json_data = json_decode($data, true);
      echo json_encode($json_data);
      ?>;
  </script>
  <!--Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- Highcharts js-->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/gantt/modules/gantt.js"></script>
  <!-- libs -->
  <script src="./public/js/programmedGantt.js"></script>
  <script src="./public/js/realGantt.js"></script>

</html>