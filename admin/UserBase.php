<?php
session_start();
require("../php/db_connect.php");

$logged = isset($_SESSION["UserId"]); //boolean
if ($logged)
    $isAdmin = ($_SESSION["isAdmin"] == "true") ? true : false ; //boolean  

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/pageStyles.css">

</head>
<body>

        <div class="container-fluid">
        <div class="top" style="background-color: gray">
                <nav class="navbar" style="padding: 0px;">
                    <div class="container-fluid" style="padding: 15px; background-color: bisque;">
                        <a class="navbar-brand col-4" href="../PHP/index.php">Logo strony</a>
                        <div class="col-sm-3 col-md-4 col-lg-5"></div> 
                        <div class="profileIcon">
                            <a class="nav-link col-1" href="
                            <?php //sPHP
                            if ($logged) {
                            echo "../php/profile.php";
                            }
                            else{
                            echo "../php/login.php";
                            }
                            //ePHP ?>
                            ">
                                <img src="../images/PageIcons/user.png" alt="user.png" width="50px" height="50px">
                            </a>
                        </div>
                        <div class="cartIcon" >
                            <a class="nav-link col-1" href="
                            <?php //sPHP
                            if ($logged) {
                            echo "../php/cart.php";
                            }
                            else{
                            echo "../php/registration.php";
                            }
                            //ePHP ?>
                            ">
                                <img src="../images/PageIcons/cart.png" alt="cart.png" width="50px" height="50px">
                            </a>
                        </div>
                        <div class="col-1">
                            <button class="navbar-toggler navbarButton" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 300px;">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../php/profile.php">Profile</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        More
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../php/cart.php">Cart</a></li>
                                        <li><a class="dropdown-item" href="../php/contact.php">Contact</a></li>
                                        <li><hr class="dropdown-divider"></li>

                                        <!-- sPHP -->
                                        <?php
                                        if($logged)
                                            echo "
                                                <li><a class='dropdown-item' href='../php/logOut.php'>Log out</a></li>"; //niszczenie sesji i wylogowanie użytkownika
                                        else
                                            echo "
                                                <li><a class='dropdown-item' href='../php/login.php'>Log in</a></li>";
                                        ?>
                                        <!-- ePHP -->

                                    </ul>
                                </li>

                                <!-- sPHP -->
                                <?php
                                if($logged && $isAdmin)
                                    echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='../admin/UserBase.php'>Admin Settings</a>
                                    </li>"
                                ?>
                                <!-- ePHP -->

                            </ul>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="main" style="display: block;">
                
                <!-- ====================================================================== -->
                <div class="main" style="padding: 15px;">
                    <div class="row">
                        <div class="col" style="text-align: center;">
                            Admin => Users base.php (Nazwa Strony)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align: center;">
                            Informacje o stronie
                        </div>
                    </div><br>
                    <div class="">

                        <!-- <div class="row" style="text-align: center;">
                           
                            <div class="col-1">
                                id
                            </div>
                            <div class="col-2">
                                email
                            </div>
                            <div class="col-2">
                                login
                            </div>
                            <div class="col-2">
                                name
                            </div>
                            <div class="col-2">
                                surname
                            </div>
                            <div class="col-3">
                                <a href="#">edit</a> || <a href="#">delete user</a>
                            </div>
                        </div> -->
                        <hr>
                        <div class="row">
                            <!-- Start PHP -->
                            <?php
                            echo'<table>
                                <tr>
                                    <th class="iDColumn">id.</th>
                                    <th class="imageColumn">email</th>
                                    <th class="titleColumn">login</th>
                                    <th class="termColumn">name</th>
                                    <th class="termColumn">surname</th>
                                    <th>edit || delete</th>
                                </tr>
                            ';
                            foreach ($rows as $row) {
                            echo'
                                <tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['login'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['surname'].'</td>
                                    <td><a href="#">edit</a> || <a href="delete.php?id='.$row['id'].'"delete user</a></td>
                                </tr>
                            ';
                            }
                            echo '</table>'
                            ?>
                            <!-- END PHP -->
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col" style="text-align: center;">
                                <q style="color:white;">If you're not a good shot today, don't worry. There are other ways to be useful.</q>
                        </div>
                  </div>
                    
                </div>
                <!-- ====================================================================== -->
                
                
            </div>
        
            <div class="footer sticky-bottom bg-gray opacity-100 w-100"  style="background-color: bisque;">
                <div class="row">
                    <p class="col-3" style="padding-left: 25px;">Copyright ©️ 2022</p>
                    <p class="col-3">...</p>
                    <p class="col-3 offset-1">Tel: +48 123 456 789</p>
                    <div class="col-2">
                        <a class="float-end" href="contact.php" style="padding-right: 15px; color: black; background-color: transparent; text-decoration: none;"><u>Kontakt</u></a>
                      </div>
                </div>
            </div>
    </div>
    
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>