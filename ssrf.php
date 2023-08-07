<?php
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

<!DOCTYPE html>
<html>
<head>
    <title>SSRF Lab for Shay</title>
</head>
<body>
    <h1>SSRF Lab</h1>
    <form action="" method="GET">
        <label for="url">Enter URL:</label>
        <input type="text" name="url" id="url">
        <input type="submit" value="Fetch URL">
    </form>
</body>
</html>
