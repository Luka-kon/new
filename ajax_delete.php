<?php
require_once ("connect.php");
if ($_POST["delete"]){
    $id = $_POST["delete"];
    $mysqli->query("DELETE FROM doctors WHERE id=\"$id\"");
}