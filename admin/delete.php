<?php
require("../php/db_connect.php");

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query($sql ->delete('Users')
              -> where('id', $_GET["id"])
              -> getSQL() );
              
header("Location: /DvD/admin/UserBase.php");
exit();
?>