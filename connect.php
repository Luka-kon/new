<?php
$servername = "127.0.0.1";
$database = "lib";
$username = "root";
$password = "";
//$connect = mysqli_connect($servername, $username, $password, $database);
$mysqli = new mysqli($servername, $username, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}






