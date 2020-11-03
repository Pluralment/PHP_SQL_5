<?php
include_once 'CheckEmailSyntax.php';

echo "<div style=\"font-size:1.5em;padding: 5px;font-family: 'Arial Black';
    display: flex;justify-content: center;align-items: center;height: 100vh;margin: 0 auto\">";

if(($_POST['first-name'] == "") or ($_POST['email'] == ""))
{
    echo "Fields are empty or incorrect data entered";
    exit();
}
$name = $_POST['first-name'];
$email = $_POST['email'];
if(CheckEmailSyntax($email))
{
    $dbName = "sample_db";
    if($mysqli = connectToDB($dbName))
    {
        $tableName = "users";
        $dbFieldName = "email";
        if(findFieldInTable($mysqli, $tableName, $dbFieldName, $email))
            echo "Email is already registered";
        else
        {
            $currDate = date("Y-m-d");
            // Текст запроса на добавление новых данных в БД.
            $query = "INSERT INTO $tableName VALUES (NULL, '$name', '$email', '$currDate', '$currDate')";
            if($mysqli->query($query))
                echo "<br/>New email is registered";
            else
                echo "<br/>Cannot register email";
        }
    }
    else
        exit();
}
else
{
    echo "Email is INCORRECT";
}
echo '</div>';
$mysqli->close();


function findFieldInTable($mysqli, $tableName, $dbFieldName, $field)
{
    $query = "SELECT * FROM ".$tableName;
    if($tableFields = $mysqli->query($query))
    {
        while($row = $tableFields->fetch_assoc())
            if($field == $row[$dbFieldName])
                return true;
    }
    else
        echo "Cannot get data from table `".$tableName."`";
    return false;
}


function connectToDB($dbName)
{
    $mysqli = new mysqli('localhost', 'root', 'webgod2020');
    if ($mysqli->connect_errno)
    {
        printf('<br/>'."Connection is failed: %s", $mysqli->connect_error);
        return null;
    }

    // Установка кодировки.
    $mysqli->query("SET CHARACTER SET 'UTF8'");
    $mysqli->query("SET CHARSET 'UTF8'");
    $mysqli->query("SET NAMES 'UTF8'");

    $query = "USE $dbName";
    // Отправка запроса на подключение к БД.
    if($mysqli->query($query))
        return $mysqli;
    else
    {
        echo "<br/>Cannot connect to database $dbName";
        return null;
    }
}
