<?php
require("../php/db_connect.php");

$id = $_GET["id_user"];
$login = $_GET["login"];
$name = $_GET["name"];
$surname = $_GET["surname"];

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query("UPDATE `Users` SET `login` = '".$login."', `name` = '".$name."', `surname` = '".$surname."' WHERE `id` = '".$id."'");
              
header("Location: /DvD/admin/UserBase.php");
exit();
?>