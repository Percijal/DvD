<?php
include 'db_connect.php';

$ready = (isset($_GET["login"])) ? true : false;

if($ready){
    $login = $_GET["login"];
    $pass = $_GET["password"];
}


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        *{
            padding: 0px;
            margin: 0px;
        }
    </style>
</head>
<body>
    <div class="container-flow">
        <fieldset>
            <legend style="text-align: center;">Log In</legend>
            <form action="login.php" method="get">
                <div class="row">
                    <div class="col-sm col-md-6 col-lg-6" style="text-align: right;">
                        <label>Login: </label>
                    </div>
                    <div class="col-sm col-md-6 col-lg-6">
                        <input type="text" name="login">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6" style="text-align: right;">
                        <label>Password: </label>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <input type="password" name="password">
                    </div>
                </div>

                <div class="row justify-content-sm-center">
                    <div class="col-sm-auto col-md-auto col-lg-auto">
                        <input type="submit" value="Log in">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6" style="text-align: right;">
                        <a href="index.html">Back to the main page</a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <a href="registration.html">Registration</a>
                    </div>
                </div>
            </form>
        </fieldset>
        <!-- Login (input) -->
        <!-- Password (input) -->
        <!-- Submit -->
        <!-- Back to the main page (Link) --> <!-- Registration (Link) -->
        <?php
        if($ready){
            for ($i=0; $i < count($rows); $i++) { 
                if($login == $rows[$i]["login"] && $pass == $rows[$i]["password"]){
                    if($rows[$i][""]=="true")
                        // Tu przekierowanie admin -> indexAdmin
                    else
                        // Tu przekierowanie uzytkownik -> index
                }
            }
        }
        ?>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
