<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./public/css/style.css">
</head>

<body class="bg-light">
<?php 
  $idUser = 0;
  if (empty($_POST['valor'])) {
    $idUser = 288;
  } else {
    $idUser = $_POST['valor'];
  }

  if (empty($_POST['valorComparar'])) {
    $_POST['valorComparar'] = 289;
  }
  ?>
  <?php require 'views/navbar/navbar.php'; ?>
  <form id="form" name="form" method="post" action="">
    <div class="container my-3">
      <div class="form-container border mt-3 mb-3 bg-white">
        <div class="mb-2" style="text-align: center;">
          <span>Ingrese el id del jugador:</span>
        </div>
        <div style="margin-left: 230px; width: 50%">
          <input class="form-control" style="text-align: center;" name="valor" type="text" id="valor" value="<?php echo $idUser; ?>" />
        </div>
      </div>

      <div class="row my-3">
        <div class="col">
          <?php require 'views/tiempo_cpk/tiempo_cpk.php'; ?>
        </div>
        <div class="col">
          <?php require 'views/tiempo_urea/tiempo_urea.php'; ?>
        </div>
      </div>

      <div class="row my-3">
        <div class="col">
          <?php require 'views/cpk_urea/cpk_urea.php'; ?>
        </div>
      </div>

      <div class="row my-3">
        <div class="col-7">
          <?php require 'views/gaussian_variables/gaussian_urea.php'; ?>
        </div>
        <div class="col-5">
          <?php require 'views/gaussian_variables/gaussian_urea_table.php'; ?>
        </div>
      </div>

      <div class="row my-3">
        <div class="col-7">
          <?php require 'views/gaussian_variables/gaussian_cpk.php'; ?>
        </div>
        <div class="col-5">
          <?php require 'views/gaussian_variables/gaussian_cpk_table.php'; ?>
        </div>
      </div>
    </div>
  </form>
  <form id="form" name="form" method="post" action="">
    <div class="container my-3">
      <div class="form-container border mt-3 mb-3 bg-white">
          <div class="mb-2" style="text-align: center;">
            <span>Ingrese el id del jugador a comparar:</span>
          </div>
          <div style="margin-left: 230px; width: 50%">
            <input class="form-control" style="text-align: center;" name="valorComparar" type="text" id="valorComparar" value="<?php echo $_POST['valorComparar']; ?>" />
          </div>
        </div>

      <div class="row my-3">
        <div class="col">
          <?php require 'views/tiempo_cpk/tiempo_cpk_compare.php'; ?>
        </div>
        <div class="col">
          <?php require 'views/tiempo_urea/tiempo_urea_compare.php'; ?>
        </div>
      </div>

        <div class="row my-3">
          <div class="col">
            <?php require 'views/gaussian_variables/gaussian_urea_to_compare.php'; ?>
          </div>
          <div class="col">
            <?php require 'views/gaussian_variables/gaussian_cpk_to_compare.php'; ?>
          </div>
        </div>
      </div>
    </div> 
  </form>
</body>
<script>
  const responseService = <?php
                          $data = file_get_contents("http://evalua.fernandoyepesc.com/04_Modules/11_Evalua/10_WS/ws_evitems.php?&eboxid=89");
                          $json_data = json_decode($data, true);
                          echo json_encode($json_data);
                          ?>;

  const responseServiceTask3 = <?php
                                $datas = file_get_contents("http://evalua.fernandoyepesc.com/04_Modules/11_Evalua/10_WS/ws_evalspereitem.php?uid=F1115&iid=" . $idUser . "&eid=40");
                                $json_datas = json_decode($datas, true);
                                echo json_encode($json_datas);
                                ?>;

  const responseServiceTask3Compare = <?php
                                $datasCompare = file_get_contents("http://evalua.fernandoyepesc.com/04_Modules/11_Evalua/10_WS/ws_evalspereitem.php?uid=F1115&iid=" . $_POST['valorComparar'] . "&eid=40");
                                $json_datasCompare = json_decode($datasCompare, true);
                                echo json_encode($json_datasCompare);
                                ?>;                                
</script>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- Chart js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./public/js/tiempo_cpk.js"></script>
<script src="./public/js/tiempo_urea.js"></script>
<script src="./public/js/tiempo_cpk_compare.js"></script>
<script src="./public/js/tiempo_urea_compare.js"></script>
<script src="./public/js/cpk_urea.js"></script>
<script type="module" src="./public/js/gaussian_variables/gaussian_cpk.js"></script>
<script type="module" src="./public/js/gaussian_variables/gaussian_urea.js"></script>
<script type="module" src="./public/js/gaussian_variables/gaussian_cpk_to_compare.js"></script>
<script type="module" src="./public/js/gaussian_variables/gaussian_urea_to_compare.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.2.1/chartjs-plugin-zoom.min.js" integrity="sha512-klQv6lz2YR+MecyFYMFRuU2eAl8IPRo6zHnsc9n142TJuJHS8CG0ix4Oq9na9ceeg1u5EkBfZsFcV3U7J51iew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>