<?php
if (!isset($_GET['url'])) {
    die("Missing 'url' parameter.");
}

$target_url = urldecode($_GET['url']);

if (!filter_var($target_url, FILTER_VALIDATE_URL)) {
    die("Invalid URL");
}

if (!preg_match("~^(https?://)~i", $target_url)) {
    die("Invalid URL scheme");
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $target_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] ?? 'PHP Proxy');

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("cURL error: " . curl_error($ch));
}

curl_close($ch);

// Remove all security headers that prevent iframe embedding
header_remove('X-Frame-Options');
header_remove('Content-Security-Policy');
header_remove('X-Content-Type-Options');
header_remove('X-Content-Security-Policy');
header_remove('X-WebKit-CSP');

header('Content-Type: text/html; charset=UTF-8');

// Fix relative paths with <base>
$base_tag = '<base href="' . htmlspecialchars($target_url, ENT_QUOTES, 'UTF-8') . '">';
$response = preg_replace('/<head>/i', "<head>\n" . $base_tag, $response, 1);

echo $response;
?>