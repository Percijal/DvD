<?php
session_start();
require("db_connect.php");

// INSERT INTO target_table
// SELECT *
// FROM source_table
// WHERE condition;

if(isset($_SESSION['UserId'])){
    $userId = $_SESSION['UserId'];
    print_r($_POST);
    // $sql = new SqlLiteQueryBuilder();
    // $query = $pdo -> query($sql ->insert("Orders", ["id_user", "id_dvd", "number_of", "price"])
    //                             ->where("id_user", $userId)
    //                             ->getSQL());
    // $sql = new SqlLiteQueryBuilder();
    // $query = $pdo -> query($sql ->delete("Cart")
    //                             ->where("id_user", $userId)
    //                             ->getSQL());
}

?>