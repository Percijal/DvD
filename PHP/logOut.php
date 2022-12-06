<?php
session_start();

session_destroy();

header("Location: /DvD/php/index.php");
exit();
?>