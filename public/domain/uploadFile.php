<div class="form-container border mt-3 mb-3">
  <form method="POST" action="index.php" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="formFile" class="form-label">Upload configuration file</label>
      <input class="form-control" type="file" id="formFile" name="uploadedFile">
    </div>
    <input class="btn btn-primary" type="submit" name="uploadBtn" value="Upload">
  </form>
</div>
<?php
    include 'GraphForType.php';
    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload'){
      if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){
          $file = $_FILES['uploadedFile']['tmp_name'];
          $fp = fopen($file, "r");
          $contents = fread($fp, filesize($file));
          $json_guiding_structure = json_decode($contents, true);
          $graphForType = new GraphForType;
          $graphForType->setGuildingStructure($json_guiding_structure);
          echo '<div>';
            $graphForType->showGraphsForType();
          echo '</div>';
        }
    }
?>