<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
  </head>
  <body class="bg-light">
    <?php require 'views/navbar/navbar.php'; ?>
    <?php require 'public/domain/uploadFile.php'; ?>
    <div class="container my-3">
      <h2 class="display-4">Charts</h2>
      <?php require 'views/histogram/histogramchart.php'; ?>
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
  <!-- Chart js-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="./public/js/lateralidad.js"></script>
  <script type="module" src="./public/js/histogram.js"></script>
  <script type="module" src="./public/js/campanaGauss/campanaGauss.js"></script>
  <script src="./public/js/posicion.js"></script>
  <script src="./public/js/raza.js"></script>
  <script src="./public/js/escolaridad.js"></script>

</html>