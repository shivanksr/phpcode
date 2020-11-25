<?php
$servername = "aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	";
$username = "jev5ofki0f28120n";
$password = "fd9mzte2a6h847ai";
$db = "chromatus_test";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $db);

// Check connection
if ($mysqli -> connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
//echo "Connected successfully <br> <br>";

?>
