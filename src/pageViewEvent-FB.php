<?php
define('SDK_DIR', __DIR__ . '/..'); // Path to the SDK directory
$loader = include SDK_DIR . '/vendor/autoload.php';

use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;
use FacebookAds\Object\ServerSide\Content;
use FacebookAds\Object\ServerSide\CustomData;
use FacebookAds\Object\ServerSide\DeliveryCategory;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Object\ServerSide\EventRequest;
use FacebookAds\Object\ServerSide\Gender;
use FacebookAds\Object\ServerSide\UserData;

// Configuration.
// Should fill in value before running this script
$access_token = "EAALUes8MOSIBAGhkZCSiOSN7k57blke49FrufCExFPoGcnN1S2cWwBCNINQ5KRqTkGBo1RpqtBMSefKwJgj5RF6UlIZAGUvOnTAnjqJnHIWcCOnnhZCzphNxwufEupguyZAd2U0UGgWGOaOWlZA0JrQO5B1yIZB4uZBKs3Wa0WZAKBmzceGzYrATYaJqlf1YeN4ZD";
$pixel_id = "489710251430721";

if (is_null($access_token) || is_null($pixel_id)) {
  throw new Exception(
    'You must set your access token and pixel id before executing'
  );
}

// Initialize
Api::init(null, null, $access_token);
$api = Api::instance();
$api->setLogger(new CurlLogger());

$events = array();

$user_data_0 = (new UserData())
  ->setEmails(array())
  ->setPhones(array())
  ->setLastNames(array())
  ->setFirstNames(array())
  ->setZipCodes(array());

$event_0 = (new Event())
  ->setEventName("PageView")
  ->setEventTime(time())
  ->setUserData($user_data_0)
  ->setCustomData($custom_data_0)
  ->setActionSource("website")
  ->setEventSourceUrl();
array_push($events, $event_0);

$request = (new EventRequest($pixel_id))
  ->setEvents($events);

$request->execute();