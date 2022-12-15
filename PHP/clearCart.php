<?php
session_start();
require("db_connect.php");

if(isset($_SESSION['UserId'])){
    $userId = $_SESSION['UserId'];
    $sql = new SqlLiteQueryBuilder();
    $query = $pdo -> query($sql ->delete("Cart")
                                ->where("id_user", $userId)
                                ->getSQL());
}

?>