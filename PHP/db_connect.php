<?php
    $pdo = new PDO('sqlite:../DB/DVDBase.db');

    $query = $pdo -> query("SELECT * FROM USERS");

    $rows = $query -> fetchAll(PDO::FETCH_ASSOC);

?>