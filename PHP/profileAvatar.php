<?php
session_start();
require("db_connect.php");

if(isset($_SESSION['UserId'])){
    $userId = $_SESSION['UserId'];
    $sql = new SqlLiteQueryBuilder();
    $query = $pdo -> query("UPDATE `Users` SET `prof_image` = '".$_POST["photoId"]."' WHERE `id` = '".$userId."'");
}

?>