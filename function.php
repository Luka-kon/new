<?php
require_once ("connect.php");

function getTable($id=0, $fio_doc=0, $year_b=0, $year_d=0, $medwork=0, $discipline=0, $comment=0){

    $search="";





    if ($id!=0){
        $search=$search." `id` LIKE '%".$id."%'";

    }
    if ($fio_doc!=0){
        $search=$search." AND `fio_doc` LIKE '%".$fio_doc."%'";

    }

    if ($year_b!=0){
        $search=$search." AND `year_b` LIKE '%".$year_b."%'";

    }

    if ($year_d!=0){
        $search=$search." AND `year_d` LIKE '%".$year_d."%'";

    }

    if ($medwork!=0){
        $search=$search." AND `medwork` LIKE '%".$medwork."%'";

    }

    if ($discipline!=0){
        $search=$search." AND `discipline` LIKE '%".$discipline."%'";

    }

    if ($comment!=0){
        $search=$search." AND `comment` LIKE '%".$comment."%'";

    }

    $search=trim($search," AND");
    $search="SELECT * FROM `doctors` WHERE".$search;

    $search=trim($search," WHERE");





    var_dump($search);
    $quer = $mysqli->query($search);
    return $quer;

}




?>