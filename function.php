<?php
require_once ("connect.php");
$fields = $mysqli->query("SELECT * FROM fields");



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
            $search=$search." AND `medwork` LIKE '%".$medwork."%'";
        }
        if ($medwork == "Не працював"){
            $medwork = 0;
            $search=$search." AND `medwork` LIKE '%".$medwork."%'";
        }
        if ($medwork == "Всі"){

        }


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


function printTable($mysqli, $query){
    $fields = $mysqli->query("SELECT * FROM fields");
    foreach ($fields as $tab) {
        if ($tab["field"] !== "id") {
            echo "<th>" . $tab["describe_ua"] . "</th>";
        }
        else
        {
            echo "<th style='width: 50px;'>№</th>";
        }

    }
    echo "<th>Удаление</th>";



    foreach ($query as $doctor) {
        foreach ($fields as $field){
            $fiel = $field["field"];
            if ($fiel == "id"){
                echo '<tr data-id="' . $doctor["$fiel"] . '">';
                $num++;
                echo "<td style='width: 50px;'>$num</td>";
            }
            elseif ($fiel == "medwork"){
                if ($doctor["$fiel"] == 1){
                    echo "<td data-filt='" . $fiel . "'>Працював</td>";
                }
                else{
                    echo "<td data-filt='" . $fiel . "'>Не працював</td>";
                }
            }

            else
            {
                echo "<td data-filt='" . $fiel . "'>" . nl2br($doctor["$fiel"]) . "</td>";
            }
        }
        echo "<td ><button class='remove_sql' value=" . $doctor["id"] . " type='button'>X</button></td>";
        echo "</tr>";
    }

}



?>