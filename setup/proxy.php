<?php
// proxy.php

// Get the target URL from query string
if (!isset($_GET['url'])) {
    die("Missing 'url' parameter.");
}

$target_url = urldecode($_GET['url']);

// Validate URL format
if (!filter_var($target_url, FILTER_VALIDATE_URL)) {
    die("Invalid URL");
}

// Optional: Only allow specific schemes (http/https)
if (!preg_match("~^(https?://)~i", $target_url)) {
    die("Invalid URL scheme");
}

// Use cURL to fetch the remote page
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $target_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] ?? 'PHP Proxy');

// Optional: Uncomment these lines if cookies are needed
// curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies.txt');
// curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookies.txt');

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("cURL error: " . curl_error($ch));
}

curl_close($ch);

// Set headers to allow iframe embedding
header('Content-Type: text/html; charset=UTF-8');
header('X-Frame-Options: SAMEORIGIN'); // Allow iframe on same domain (your site)

// Optional: Modify HTML here if needed (e.g. base tag, script fixes)
// Example: Add <base> tag to fix relative paths
$base_tag = '<base href="' . htmlspecialchars($target_url) . '">';
$response = str_replace('<head>', '<head>' . $base_tag, $response);

echo $response;
?>