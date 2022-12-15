<?php
require("../php/db_connect.php");

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query($sql ->delete('Cart')
            -> where('id', $_GET["id"])
            -> getSQL() );
              
header("Location: /DvD/PHP/Cart.php");
exit();
?>