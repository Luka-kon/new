<?php
require_once ("connect.php");
if ($_POST["new_text"]){
    $new_text = $_POST["new_text"];
    $id = $_POST["td_id"];
    $filt = $_POST["filt"];
    $sql = "UPDATE doctors SET " . $filt . "='" . $new_text . "'WHERE id=\"$id\"";
    $mysqli->query("$sql");
    echo $sql;
}