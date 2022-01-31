<?php
require_once ("connect.php");
if ($_POST["fild"]){
    $id = $_POST["fild"];
    $sql = 'INSERT INTO doctors (' . $_POST["fild"] . ") " . 'VALUES (' . $_POST["val"] . ')';
    echo $sql;
 
    $mysqli->query("$sql");

}