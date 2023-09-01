<?php
// use
error_reporting(E_ALL);
ini_set('display_errors', 1);

use AfricasTalking\SDK\AfricasTalking;

require('../vendor/autoload.php');

$username = "sandbox";
$key = "1308efdbb33240767919b5383d32aacc055887fe41267688f17e9d600d66c07e";

$sender = new AfricasTalking($username, $key);

$sms = $sender->sms();

$response = $sms->send([
    'to' => '+254769287724',
    'message' => 'Hello this is a message from AfricansTalking',
    'from' => 'WiseDigits Academy'
]);

print_r($response);
