<?php
require_once ("connect.php");

function getTable($mysqli, $id="", $fio_doc="", $year_b="", $year_d="", $medwork="", $discipline="", $comment=""){
    $search="";
    if ($id != ""){
        $search=$search." `id` LIKE '%".$id."%'";

    }
    if ($fio_doc!= ""){
        $search=$search." AND `fio_doc` LIKE '%".$fio_doc."%'";

    }

    if ($year_b!= ""){
        $search=$search." AND `year_b` LIKE '%".$year_b."%'";

    }

    if ($year_d!= ""){
        $search=$search." AND `year_d` LIKE '%".$year_d."%'";

    }

    if ($medwork!= ""){
        if ($medwork == "Працював"){
            $medwork = 1;
        }
        if ($medwork == "Не працював"){
            $medwork = 0;
        }
        $search=$search." AND `medwork` LIKE '%".$medwork."%'";

    }

    if ($discipline!= ""){
        $search=$search." AND `discipline` LIKE '%".$discipline."%'";

    }

    if ($comment!= ""){
        $search=$search." AND `comment` LIKE '%".$comment."%'";

    }

    $search=trim($search," AND");
    $search="SELECT * FROM `doctors` WHERE".$search;

    $search=trim($search," WHERE");
    $quer = $mysqli->query($search . "ORDER BY fio_doc");
    return $quer;

}




?>