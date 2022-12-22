<?php
require("../php/db_connect.php");

$id = $_GET["id_dvd"];
$descrip = $_GET["descrip"];
$price = $_GET["price"];

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query("UPDATE `DVDs` SET `descrip` = '".$descrip."', `price` = '".$price."' WHERE `id` = '".$id."'");
              
header("Location: /DvD/admin/UserBase.php");
exit();
?>