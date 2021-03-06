<?php
/**
 * Created by PhpStorm.
 * User: Stoffer
 * Date: 26/02/2018
 * Time: 10:38
 */

# /js-login.php
$fb = new Facebook\Facebook([
    'app_id' => '215632238985529',
    'app_secret' => '56f5150c61dc6f76fb9f3bdd7af6edbf',
    'default_graph_version' => 'v2.12',
]);

$helper = $fb->getJavaScriptHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (! isset($accessToken)) {
    echo 'No cookie set or no OAuth data could be obtained from cookie.';
    exit;
}

// Logged in
echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());

$_SESSION['fb_access_token'] = (string) $accessToken;