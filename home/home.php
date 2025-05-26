<?php
    session_start();
    $iframeUrl = isset($_SESSION['iframe_url']) ? $_SESSION['iframe_url'] : "about:blank"; // Default if no URL
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <h2>Welcome to Home Page</h2>

    <iframe id="gameFrame" src="<?php echo htmlspecialchars($iframeUrl, ENT_QUOTES, 'UTF-8'); ?>" width="100%"
        height="600px" frameborder="0" allowfullscreen>
    </iframe>

</body>

</html>