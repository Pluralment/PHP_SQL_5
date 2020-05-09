<?php

echo '<link href="Style.css" rel="stylesheet">';

$mysqli = new mysqli('localhost', 'root', 'webgod2020');
if ($mysqli->connect_errno)
{
    printf('<br/>'."Соединение не удалось: %s", $mysqli->connect_error);
    exit();
}
else
    echo "<br/>".$mysqli->host_info;

// Установка кодировки.
$mysqli->query("SET CHARACTER SET 'UTF8'");
$mysqli->query("SET CHARSET 'UTF8'");
$mysqli->query("SET NAMES 'UTF8'");

$dbName = 'sample_db';
$query = "USE ".$dbName;
if($mysqli->query($query))
    echo "<br/>"."Соединение с БД ".$dbName." установлено";
else
{
    echo "<br/>Не удалось соединиться с БД ".$dbName;
    exit();
}

showAllTablesContent($mysqli);
echo '<br/><br/><br/><br/>';

if($result = $mysqli->query("SELECT * FROM users NATURAL JOIN article_info"))
{
    echo '<div class="main">';
    showTableContent($result);
    echo '</div>';

    $result->free();
}
else
    echo "<br/>Результат не получен";

$mysqli->close();


/* ----------------------------------------------- */
function showAllTablesContent($db)
{
    $tablesFetch = $db->query("SHOW TABLES");
    while ($row = $tablesFetch->fetch_row())
    {
        foreach($row as $tableName)
        {
            echo '<br/><br/><br/><br/>';
            $query = "SELECT * FROM ".$tableName;
            $result = $db->query($query);
            echo '<h2 class="horizontal-centered-text">'.$tableName.'</h2>';
            echo '<div class="main">';
            showTableContent($result);
            echo '</div>';
            $result->free();
        }
    }
    $tablesFetch->free();
}


function showTableContent($fieldArray)
{
    echo '<table class="table_col">';

    $fInfo = $fieldArray->fetch_fields();

    // Вывод заголовков результата.
    echo "<tr>";
    foreach ($fInfo as $val)
        echo "<th>".$val->name."</th>";
    echo "</tr>";

    // Вывод полей данных.
    while ($row = $fieldArray->fetch_row())
    {
        echo "<tr>";
        foreach($row as $value)
        {
            echo "<td>".$value."</td>";
        }
        echo "</tr>";
    }
    echo '</table>';
}
