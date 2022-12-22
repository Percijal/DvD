<?php
require("../php/db_connect.php");

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query($sql ->delete('DVDs')
              -> where('id', $_GET["id"])
              -> getSQL() );

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query($sql ->delete('Orders')
            -> where('id_dvd', $_GET["id"])
            -> getSQL() );

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query($sql ->delete('Cart')
            -> where('id_dvd', $_GET["id"])
            -> getSQL() );
              
header("Location: /DvD/admin/UserBase.php");
exit();
?>