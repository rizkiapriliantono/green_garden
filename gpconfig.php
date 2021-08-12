<?php
session_start();
// Include Librari Google Client (API)
include_once 'assets/plugins/google-client/Google_Client.php';
include_once 'assets/plugins/google-client/contrib/Google_Oauth2Service.php';
$client_id = '564215586565-kj7l687enpps3fmnhnmivbece7kpbuke.apps.googleusercontent.com'; // Google client ID
$client_secret = 'hQZ9yOh9aF1XwvJr2aJdNKXw'; // Google Client Secret
$redirect_url = 'http://localhost/green_garden/google.php'; // Callback URL
// Call Google API
$gclient = new Google_Client();
$gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login
$google_oauthv2 = new Google_Oauth2Service($gclient);
?>