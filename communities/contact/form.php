<?php 
//======================================================================
// Google reCaptcha V3 API POST - This is for the pop up modal form on community page. 
//======================================================================

$firstName; $lastName; $email; $phone; $zipCode; $community; $aptDate; $aptTime; $comments; $action; $captcha;

$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$zipCode = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_STRING);
$community = filter_input(INPUT_POST, 'community', FILTER_SANITIZE_STRING);
$aptDate = filter_input(INPUT_POST, 'aptDate', FILTER_SANITIZE_STRING);
$aptTime = filter_input(INPUT_POST, 'aptTime', FILTER_SANITIZE_STRING);
$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
$captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

if(!$captcha) {
    echo 'Please check the captcha'; 
    exit;
}

$secretKey = "6LfCa4oiAAAAALDhKBB5rQnKsMygEtMkeRHovvLR";
$ip = $_SERVER['REMOTE_ADDR'];

// post request to server
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array('secret' => $secretKey, 'response' => $captcha, 'remoteip' => $ip);

$options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$responseKeys = json_decode($response,true);
header('Content-type: application/json');

if($responseKeys["success"] && $responseKeys["action"] == $action && $responseKeys["score"] >= 0.8) {
    echo json_encode(array('success' => 'true'));
  } else {
    echo json_encode(array('success' => 'false'));
}



?> 