
<!--               ПОДКЛЮЧЕНИЕ-->
<?php
require_once ("connect.php");
$fields = $mysqli->query("SELECT * FROM fields");
$doctors = $mysqli->query("SELECT * FROM doctors");
?>

<!--              ВЫВОД ФОРМЫ ПОИСКА JS-->
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <div class="filtforms">
<?php
$search="SELECT * FROM doctors LIMIT 0, 10";
$num = 0;
        foreach ($fields as $tab) {
//            if ($tab["field"] == "id"){
////                echo "<td></td>";
//            }
//            else
                echo '<div class="filtform"><input placeholder="' . $tab["describe_ua"] . '" type="text" />   </div>';
        }

?>
</div>
    <br/>
    <br/>
    <br/>
    <br/>

<!--       ФОРМА ПОИСКА НА PHP-->


    <div class="search_php">
        <?php
        $num = 0;

            echo '<form method="post"><br/>';
            echo '<input name="id" placeholder="№"/> <br/>';
            echo '<input name="fio_doc" placeholder="ПІБ"/> <br/>';
            echo '<input name="year_b" placeholder="Рік народження"/> <br/>';
            echo '<input name="year_d" placeholder="Рік смерті"/> <br/>';
            echo '<input name="medwork" placeholder="Працював в медині?"/> <br/>';
            echo '<input name="discipline" placeholder="Дисципліна"/> <br/>';
            echo '<input name="comment" placeholder="Коментар"/> <br/>';


        echo '<select name="colvo">
<option value="10">10</option>
<option value="20">20</option>
</select>';
        echo '<input name="search_but" type="submit"/><br/>';
        echo '</form>';
        ?>
    </div>







<!--   НАЧАЛО ФОРМЫ ДОБАВЛЕНИЯ -->

<head>
<body>
<table>
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


<!--               ВЫВОД ОСНОВНОЙ ТАБЛИЦЫ-->
<!---->
<!--<table>-->
<!--    --><?php
//    foreach ($fields as $tab) {
//    if ($tab["field"] !== "id") {
//    echo "<th>" . $tab["describe_ua"] . "</th>";
//    }
//    else
//    {
//        echo "<th style='width: 50px;'>№</th>";
//    }
//
//    }
//    echo "<th>Удаление</th></table>";
//    echo "<table id='tab'>";
//
//
//    foreach ($doctors as $doctor) {
//    foreach ($fields as $field){
//    $fiel = $field["field"];
//    if ($fiel == "id"){
//        echo '<tr data-id="' . $doctor["$fiel"] . '">';
//        $num++;
//        echo "<td style='width: 50px;'>$num</td>";
//        }
//    elseif ($fiel == "medwork"){
//        if ($doctor["$fiel"] == 1){
//        echo "<td data-filt='" . $fiel . "'>Працював</td>";
//        }
//        else{
//            echo "<td data-filt='" . $fiel . "'>Не працював</td>";
//        }
//    }
//
//    else
//        {
//       echo "<td data-filt='" . $fiel . "'>" . nl2br($doctor["$fiel"]) . "</td>";
//        }
//    }
//    echo "<td ><button class='remove_sql' value=" . $doctor["id"] . " type='button'>X</button></td>";
//    echo "</tr>";
//}
//?>
<!--                        ОКОНЧАНИЕ ВЫВОДА ОСНОВНОЙ ТАБЛИЦЫ-->
<!--</table>-->

<table>
<?php
function link_bar($page, $pages_count)
{
    for ($j = 1; $j <= $pages_count; $j++)
    {
// Вывод ссылки
        if ($j == $page) {
            echo ' <a style="color: #808000;" ><b>'.$j.'</b></a> ';
        } else {
            echo ' <a style="color: #808000;" href='.$_SERVER['php_self'].'?page='.$j.'>'.$j.'</a> ';
        }
// Выводим разделитель после ссылки, кроме последней
// например, вставить "|" между ссылками
        if ($j != $pages_count) echo '  |  ';
    }
    return true;
} // Конец функции


    if (isset($_POST['search_but'])){
        $num=0;
        //$chek=0;
        $search="";





        if (!empty($_POST['id'])){
            $search=$search." `id` LIKE '%".$_POST['id']."%'";

        }
        if (!empty($_POST['fio_doc'])){
            $search=$search." AND `fio_doc` LIKE '%".$_POST['fio_doc']."%'";

        }

        if (!empty($_POST['year_b'])){
            $search=$search." AND `year_b` LIKE '%".$_POST['year_b']."'";

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
        //$search=$search." limit '.$start_pos.', '.$perpage";
        $search=trim($search," WHERE");

        //            ФУНКЦИЯ ДЛЯ ПОСТРАНИЧНОГО ВЫВОДА
        $perpage = $_POST['colvo']; // Количество отображаемых данных из БД

        if (empty(@$_GET['page']) || ($_GET['page'] <= 0)) {
            $page = 1;
        } else {
            $page = (int) $_GET['page']; // Считывание текущей страницы

        }


// Общее количество информации
        $cou = $mysqli->query($search) or die('error! Записей не найдено!');
        $count = $cou->num_rows;
        $pages_count = ceil($count / $perpage); // Количество страниц

// Если номер страницы оказался больше количества страниц
        if ($page > $pages_count) $page = $pages_count;
        $start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД

// Вызов функции, для вывода ссылок на экран
//        link_bar($page, $pages_count);





        $search = $search." LIMIT $start_pos, $perpage";

        var_dump($search);







    }

link_bar($page, $pages_count);
$quer = $mysqli->query($search);

foreach ($quer as $tab){

}
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


?>
</table>

<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
