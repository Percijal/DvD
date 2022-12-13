<?php
session_start();
require("db_connect.php");

if(isset($_SESSION['UserId'])){
    $userId = $_SESSION['UserId'];
    $sql = new SqlLiteQueryBuilder();
    $query = $pdo -> query($sql ->insert("Cart", ['id_user','id_dvd','number_of','discount'])
                                ->values([$userId, $_POST['id'], 1, $_POST['disc']])
                                ->getSQL());
}

?>