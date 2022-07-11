<form method="POST" action="index.php" enctype="multipart/form-data">
      <div>
        <span>Upload a File:</span>
        <input type="file" name="uploadedFile" />
      </div><br>
      <input type="submit" name="uploadBtn" value="Upload" />
    </form>
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
          echo '<div class="charts-container">';
            $graphForType->showGraphsForType();
          echo '</div>';
        }
    }
?>

<style>
  .grid {
    display: grid;
    grid-template-columns: repeat(<?php echo $graphForType->fila ?>, 1fr);
    grid-gap: 40px;
    grid-auto-rows: 400px;
}
</style>