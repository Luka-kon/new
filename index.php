
<!--               ПОДКЛЮЧЕНИЕ-->
<?php
require_once ("connect.php");
$fields = $mysqli->query("SELECT * FROM fields");
$doctors = $mysqli->query("SELECT * FROM doctors");

if (isset($_GET['page'])){
    echo $_GET['page'];
}
?>

<!--              ВЫВОД ФОРМЫ ПОИСКА JS-->
<html>
<head>
    <link rel="stylesheet" href="css/style.css">

        <head/>
<body>

<!--       ФОРМА ПОИСКА НА PHP-->


<div style="float: left; margin-left: 150px">
    <h3>Форма пошуку даних</h3>
    <?php
    $num = 0;

    echo '<form style="" method="post">';
    echo '<input name="id" placeholder="№"/> <br/>';
    echo '<input name="fio_doc" placeholder="ПІБ"/> <br/>';
    echo '<input name="year_b" placeholder="Рік народження"/> <br/>';
    echo '<input name="year_d" placeholder="Рік смерті"/> <br/>';
    echo '<input name="medwork" placeholder="Працював в медині?"/> <br/>';
    echo '<input name="discipline" placeholder="Дисципліна"/> <br/>';
    echo '<input name="comment" placeholder="Коментар"/> <br/>';


    echo '<input name="search_but" type="submit" value="Відправити запит"/><br/>';
    echo '<input name="ubiley" type="submit" value="Передивитись юбілярів"/><br/>';
    echo '</form>';
    ?>
</div>


    <div class="filtforms" style="float: left; margin-left:400px"" >
        <h3>Форма фільтрації знайдених даних</h3>
    <?php
$search="SELECT * FROM doctors";
$num = 0;
        foreach ($fields as $tab) {

                echo '<div class="filtform"><input placeholder="' . $tab["describe_ua"] . '" type="text" />   </div>';
        }

?>
</div>





<!--   НАЧАЛО ФОРМЫ ДОБАВЛЕНИЯ -->



<table style="text-align: left">
    <tr class="add">
        <?php
        foreach ($fields as $tab) {
            if ($tab["field"] == "id"){
                //echo "<td></td>";
            }
            elseif ($tab["field"] == "comment" || $tab["field"] == "discipline"){
                echo '<td><textarea data-value="' . $tab["field"]  . '"></textarea></td>';
            }
            elseif ($tab["field"] == "medwork"){
                echo '<td> <select data-value="' . $tab["field"]  . '"><option value="1">Да</option><option value="0">Нет</option></select></td>';
            }
            else
                echo '<td><input type="text" data-value="' . $tab["field"]  . '" placeholder="' . $tab["describe_ua"]  . '"></td>';
        }
        echo "<td><button class='add_sql' type='button'>+</button></td>";
        if ($_POST["val"]){
            echo $_POST["val"];
        }
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

        $search="";





        if (!empty($_POST['id'])){
            $search=$search." `id` LIKE '%".$_POST['id']."%'";

        }
        if (!empty($_POST['fio_doc'])){
            $search=$search." AND `fio_doc` LIKE '%".$_POST['fio_doc']."%'";

        }

        if (!empty($_POST['year_b'])){
            $search=$search." AND `year_b` LIKE '%".$_POST['year_b']."%'";

        }

        if (!empty($_POST['year_d']) ){
            $search=$search." AND `year_d` LIKE '%".$_POST['year_d']."%'";

        }

        if (!empty($_POST['medwork'])){
            $search=$search." AND `medwork` LIKE '%".$_POST['medwork']."%'";

        }

        if (!empty($_POST['discipline'])){
            $search=$search." AND `discipline` LIKE '%".$_POST['discipline']."%'";

        }

        if (!empty($_POST['comment'])){
            $search=$search." AND `comment` LIKE '%".$_POST['comment']."%'";

        }

        $search=trim($search," AND");
        $search="SELECT * FROM `doctors` WHERE".$search;

        $search=trim($search," WHERE");

        //            ФУНКЦИЯ ДЛЯ ПОСТРАНИЧНОГО ВЫВОДА
        $perpage = $_POST['colvo']; // Количество отображаемых данных из БД

        if (empty(@$_GET['page']) || ($_GET['page'] <= 0)) {
            $page = 1;
        } else {
            $page = (int) $_GET['page']; // Считывание текущей страницы

        }




        $quer = $mysqli->query($search);


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
