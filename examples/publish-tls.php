<?php

require("../phpMQTT.php");

$server = "mqtt.example.com";     // change if necessary
$port = 8883;                     // change if necessary
$username = "username";           // set your username
$password = "pass";               // set your password
$client_id = "phpMQTT-publisher"; // make sure this is unique for connecting to sever - you could use uniqid()
$cafile = '/path/to/cert/chain.pem';
$tls_version = 'tlsv1.2';

$mqtt = new phpMQTT($server, $port, $client_id, $cafile, $tls_version);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("bluerhinos/phpMQTT/examples/publishtest", "Hello World! at " . date("r"), 0);
	$mqtt->close();
} else {
    echo "Time out!\n";
}
