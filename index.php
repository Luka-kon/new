<!--               ПОДКЛЮЧЕНИЕ-->
<?php
require_once ("connect.php");
$fields = $mysqli->query("SELECT * FROM fields");
$doctors = $mysqli->query("SELECT * FROM doctors");
require_once ("function.php");
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
       <?php
       foreach ($fields as $tab) {
           if ($tab["field"] != "medwork"){
               if ($tab["field"] != "id"){
               echo '<div class="filtform"><input name="' . $tab["field"] . '" placeholder="' . $tab["describe_ua"] . '" type="text" />   </div>';
           }}
           else echo '<div class="filtform"><select style="width: 50%" name="' . $tab["field"] . '" placeholder="' . $tab["describe_ua"] . '" type="text" >   
           <option>Всі</option>
           <option>Працював</option>
           <option>Не працював</option>
</select>
</div>';
       }
       echo '<input name="search_but" type="submit" value="Відправити запит"/><br/>';
       ?>
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
?>
</div></div>

<!--   НАЧАЛО ФОРМЫ ДОБАВЛЕНИЯ -->
<table id="tab" style="text-align: left">
    <tr class="add">
        <?php
        foreach ($fields as $tab) {
            if ($tab["field"] == "id"){
                echo '<td><label>' . $tab["describe_ua"] . '</label></td>';
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

    <?php
    if (isset($_POST['ubiley'])){
        $result=$mysqli->query("SELECT * FROM doctors WHERE year_b LIKE '%2'");
        printTable($mysqli, $result);
    }
    ?>

<?php
    if (isset($_POST['search_but'])){
        $num=0;
        $quer = getTable($mysqli, $_POST['id'], $_POST['fio_doc'], $_POST['year_b'], $_POST['year_d'], $_POST['medwork'], $_POST['discipline'], $_POST['comment']);
        printTable($mysqli, $quer);
    }
?>
</table>
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
