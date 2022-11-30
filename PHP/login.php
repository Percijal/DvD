<?php
session_start();
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
        /* .container-flow{
            
        }*/
        .button{
            padding: 5px;
            margin: 5px;
            width: 65px;
            border-radius: 25px;
            box-shadow: 7px 5px 5px gold;
            font-style: italic;
        }
        label{
            font-style: italic;
        }
        a{
            font-style: italic;
            text-decoration: none;
            color: gold;
        }
        a:hover{
            color:orangered
        }
    </style>
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

                <div class="row justify-content-sm-center">
                    <div class="col-auto col-sm-auto col-md-auto col-lg-auto">
                        <input type="submit" value="Log in" class="button">
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
<?php
    if($ready){
        for ($i=0; $i < count($rows); $i++) {
            if($login == $rows[$i]["login"] && $pass == $rows[$i]["password"]){
                $_SESSION["UserId"] = $rows[$i]["id"];
                $_SESSION["isAdmin"] = $rows[$i]["is_admin"];
                header("Location: /php/index.php");
                exit();
            }
            else{
                print("ZŁE DANE");
                $_POST = array();
            }
        }
    }
?>