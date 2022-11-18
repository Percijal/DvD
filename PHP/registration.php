<?php
include 'db_connect.php';

$ready = (isset($_GET["login"])) ? true : false;

if($ready){
    $email = $_POST["e-mail"];
    $login = $_POST["login"];
    $pass = $_POST["password"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
            <legend style="text-align: center;">Registration</legend>
            <form>
                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <label>E-mail: </label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="e-mail">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <label>Login / User's nickname: </label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="login">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <label>Name: </label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="name">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <label>Surname: </label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="surname">
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

                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <label>Repeat password: </label>
                    </div>
                    <div class="col-6">
                        <input type="password" name="passwordRepeated">
                    </div>
                </div>

                <div class="row justify-content-sm-center">
                    <div class="col-auto col-sm-auto col-md-auto col-lg-auto">
                        <input type="submit" name="login" value="Register">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <a href="index.html">Back to the main page</a>
                    </div>
                    <div class="col-6">
                        <a href="login.html">Login</a>
                    </div>
                </div>
            </form>
        </fieldset>
        <!-- e-mail (input)(To the first login) -->
        <!-- Login (input)(User's name/User's id)(Every another login) -->
        <!-- User's Name (input) -->
        <!-- User's Surname (input) -->
        <!-- Password (input) -->
        <!-- Repeat Password (input) -->
        <!-- Submit -->
        <!-- Back to the main page (Link) --> <!-- Login (Link) -->
        <?php
        if($ready){
            $query = $pdo -> query("INSERT INTO USERS(`name`, `surname`, `login`, `password`, `email`)
            VALUES (".$name.", ".$surname.", ".$login.",".$pass.",".$email.");");
        }
        ?>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>