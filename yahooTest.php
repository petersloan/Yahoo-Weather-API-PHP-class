<?php

include_once(dirname(__FILE__) . '/yosdk/lib/Yahoo.inc');
require '../inc/config.php';

YahooLogger::setDebug(true);

// Get a session first. If the viewer isn't sessioned yet, this call 
// will redirect them to log in and authorize your application to 
$session = YahooSession::requireSession($config['yh_consumerKey'], $config['yh_consumerKeySecret'], $config['yh_applicationId']);

$twoleg = new YahooApplication ($config['yh_consumerKey'], $config['yh_consumerKeySecret']);
//$query = "select * from weather.forecast where woeid=\"2487889\"";
$query = "select atmosphere,item.condition from weather.forecast where woeid=\"" . $config['local_woeid'] . "\"";
$results = $twoleg->query ($query);
echo print_r ($results);

echo "<br /><br /><br />Weather:<br />";
$weather = $twoleg->weather($config['local_woeid'], strtolower($config['temperature_units']));
echo print_r ($weather);

?>