<?php
session_start();
include 'db_connect.php';

$ready = (isset($_GET["login"])) ? true : false;

if($ready){
    $login = $_GET["login"];
    $pass = $_GET["password"];
}

if($ready){
    for ($i=0; $i < count($rows); $i++) {
        if($login == $rows[$i]["login"] && $pass == $rows[$i]["password"]){
            $_SESSION["UserId"] = $rows[$i]["id"];
            $_SESSION["isAdmin"] = $rows[$i]["is_admin"];
            $_SESSION["Name"] = $rows[$i]["name"];
            $_SESSION["Surname"] = $rows[$i]["surname"];
            //header("Location: /php/index.php");
            header("Location: index.php");
            exit();
            return;
        }
    }
        $_POST = array();
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
    <link rel="stylesheet" href="../CSS/pageStyles.css">
    
</head>
<body style="background-color: beige;">
    <div class="container-flow">
        <fieldset style="background-color: gray; margin: 17%; padding: 20px; border-radius: 50px;">
            <legend style="text-align: center; font-style: italic; font-weight: bold;">Log In</legend>
            <form action="login.php" method="get">
                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <label>Login: </label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="login">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <label>Password: </label>
                    </div>
                    <div class="col-6">
                        <input type="password" name="password">
                    </div>
                </div>

                <div class="row" id="errorDiv" <?php if ($ready) { echo ""; } else {echo "hidden";}?>>
                    <div div class="col-12" style="text-align: center;">
                        <ul id="info" style="color: Darkred; text-decoration: none; letter-spacing: 1.5px; list-style: none;">
                            <?php
                                if($ready){
                                    ?>
                                        <li><b><i>Złe dane</i></b></li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="row justify-content-sm-center">
                    <div class="col-auto col-sm-auto col-md-auto col-lg-auto">
                        <input type="submit" value="Log in" class="loginButton">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <a href="index.php">Back to the main page</a>
                    </div>
                    <div class="col-6">
                        <a href="registration.php">Registration</a>
                    </div>
                </div>
            </form>
        </fieldset>
        <!-- Login (input) -->
        <!-- Password (input) -->
        <!-- Submit -->
        <!-- Back to the main page (Link) --> <!-- Registration (Link) -->
    </div>
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>