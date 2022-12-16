<?php
session_start();
require("db_connect.php");

// INSERT INTO target_table
// SELECT *
// FROM source_table
// WHERE condition;

if(isset($_SESSION['UserId'])){
    $userId = $_SESSION['UserId'];
    $sql = new SqlLiteQueryBuilder();
    $query = $pdo -> query($sql ->select("Cart", ["id_user", "id_dvd","number_of","discount", "price"])
                                ->join("Cart","DVDs","id_dvd","id")
                                ->where("id_user", $userId)
                                ->getSQL());
    $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
        $date1 = new DateTime();
        $date2 = new DateTime();
        $date2->add(new DateInterval('P1M'));
        $sql = new SqlLiteQueryBuilder();
        $query = $pdo -> query($sql ->insert("Orders", ["id_user", "id_dvd", "number_of", "price", "date_start", "date_end"])
                                    ->values([$row["id_user"],$row["id_dvd"],$row["number_of"], ($row["number_of"] * round($row["price"] - ($row['discount']/100 * $row["price"]),2)),$date1->format('d-m-Y'),$date2->format('d-m-Y')])
                                    ->getSQL());
        $sql = new SqlLiteQueryBuilder();
        $query = $pdo -> query($sql ->delete("Cart")
                                    ->where("id_user", $userId)
                                    ->getSQL());
    }
}

?>