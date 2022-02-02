
<!--               ПОДКЛЮЧЕНИЕ-->
<?php
require_once ("connect.php");
$fields = $mysqli->query("SELECT * FROM fields");
$doctors = $mysqli->query("SELECT * FROM doctors");

require_once ("function.php");
if (isset($_GET['page'])){
    echo $_GET['page'];
}
?>

<!--              ВЫВОД ФОРМЫ ПОИСКА JS-->
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
        <head/>
<body>

<!--       ФОРМА ПОИСКА НА PHP-->

<div class="row">
<div style="margin-left: 50px;"  class="col">
    <h2>Форма пошуку</h2>



   <form style="" method="post">

    <input name="fio_doc" placeholder="ПІБ"/> <br/>
    <input name="year_b" placeholder="Рік народження"/> <br/>
    <input name="year_d" placeholder="Рік смерті"/> <br/>
    <input name="medwork" placeholder="Працював в медині?"/> <br/>
    <input name="discipline" placeholder="Дисципліна"/> <br/>
    <input name="comment" placeholder="Коментар"/> <br/><br/>
    <input name="search_but" type="submit" value="Відправити запит"/><br/>

    </form>

</div>
<div class="col">
    <br/><br/><br/>
    <form method="post">
        <input name="ubiley" type="submit" value="Передивитись юбілярів"/>
    </form>
</div>
    <div class="filtforms col" >
        <h2>Форма фільтрації</h2>
    <?php

        foreach ($fields as $tab) {
            if ($tab["field"] != "id"){
        echo '<div class="filtform"><input placeholder="' . $tab["describe_ua"] . '" type="text" />   </div>';
            }
        }
    //$search="SELECT * FROM doctors";
    //$num = 0;
?>
</div></div>





<!--   НАЧАЛО ФОРМЫ ДОБАВЛЕНИЯ -->



<table style="text-align: left">
    <tr class="add">
        <?php
        foreach ($fields as $tab) {
            if ($tab["field"] == "id"){
                //echo "<td></td>";
            }
            elseif ($tab["field"] == "comment" || $tab["field"] == "discipline"){
                echo '<td><label>' . $tab["describe_ua"] . '</label><textarea data-value="' . $tab["field"]  . '"></textarea></td>';
            }
            elseif ($tab["field"] == "medwork"){
                echo '<td> <select data-value="' . $tab["field"]  . '"><option value="1">Да</option><option value="0">Нет</option></select></td>';
            }
            else
                echo '<td><label>' . $tab["describe_ua"] . '</label><br><input type="text" data-value="' . $tab["field"]  . '" placeholder="' . $tab["describe_ua"]  . '"></td>';
        }
        echo "<td><button class='add_sql' type='button'>+</button></td>";
        ?>

    </tr>
</table>


<table>
    <?php

    if (isset($_POST['ubiley'])){
        $result=$mysqli->query("SELECT * FROM doctors WHERE year_b LIKE '%2'");

        foreach ($fields as $tab) {
            if ($tab["field"] !== "id") {
                echo "<th>" . $tab["describe_ua"] . "</th>";
            }
            else
            {
                echo "<th style='width: 50px;'>№</th>";
            }

        }
        echo "<th>Удаление</th></table>";
        echo "<table id='tab'>";


        foreach ($result as $doctor) {
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
</table>

<table>
<?php




    if (isset($_POST['search_but'])){
        $num=0;
       $quer = getTable($mysqli, $_POST['id'], $_POST['fio_doc'], $_POST['year_b'], $_POST['year_d'], $_POST['medwork'], $_POST['discipline'], $_POST['comment']);


        foreach ($fields as $tab) {
            if ($tab["field"] !== "id") {
                echo "<th>" . $tab["describe_ua"] . "</th>";
            }
            else
            {
                echo "<th style='width: 50px;'>№</th>";
            }

        }
        echo "<th>Удаление</th></table>";
        echo "<table id='tab'>";


        foreach ($quer as $doctor) {
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
</table>

<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
