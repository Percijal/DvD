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
                        <a class="navbar-brand col-4" href="../PHP/index.php"><img src="../images/logo2.png" alt="logo" width="50px" height="50px" style="margin-left: 20px;"></a>
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
                                    <a class="nav-link active" aria-current="page" href="../php/index.php">Home</a>
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
                        <div class="col adminPageTitle">
                            Administration panel
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align: center;">
                            User & Movie management
                        </div>
                    </div>
                    <div>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <!-- Start PHP -->
                                <?php
                                echo'
                                <table class="usersData table table-responsive"">
                                    <tr>
                                        <th class="th">Id.</th>
                                        <th class="th">Email</th>
                                        <th class="th">Login</th> 
                                        <th class="th">Name</th>
                                        <th class="th">Surname</th>
                                        <th class="th thLast">edit || delete</th>
                                    </tr>
                                ';
                                foreach ($rows as $row) {
                                echo'
                                    <tr>
                                        <td class="td">'.$row['id'].'</td>
                                        <td class="td">'.$row['email'].'</td>
                                        <td class="td">'.$row['login'].'</td>
                                        <td class="td">'.$row['name'].'</td>
                                        <td class="td">'.$row['surname'].'</td>
                                        <td class="td tdLast"><a href="#">edit</a> || <a href="delete.php?id='.$row['id'].'">delete user</a></td>
                                    </tr>
                                ';
                                }
                                echo '</table>'
                                ?>
                                <!-- END PHP -->
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <!-- Start PHP  --> <!-- Poniżej machniemy info odnosnie filmu. -->
                                    <?php
                                    echo'
                                    <table class="usersData table table-responsive"">
                                        <tr>
                                            <th class="th">Id.</th>
                                            <th class="th">Image</th>
                                            <th class="th">Title</th>
                                            <th class="th">Genre</th>
                                            <th class="th">Author</th>
                                            <th class="th">Year of production</th>
                                            <th class="th">Description</th>
                                            <th class="th">Price</th>
                                            <th class="th thLast">edit || delete</th>
                                        </tr>
                                    ';
                                    foreach ($rows as $row) {
                                    echo'
                                        <tr>
                                            <td class="td">'. " " .'</td>
                                            <td class="td">'. " " .'</td>
                                            <td class="td">'. " " .'</td>
                                            <td class="td">'. " " .'</td>
                                            <td class="td">'. " " .'</td>
                                            <td class="td">'. " " .'</td>
                                            <td class="td">'. " " .'</td>
                                            <td class="td">'. " " .'</td>   
                                            <td class="td tdLast"><a href="#">edit</a> || <a href="delete.php?id='. " " .'">delete user</a></td>
                                        </tr>
                                    ';
                                    }
                                    echo '</table>'
                                    ?>
                                    <!-- END PHP -->
                                </div>
                            </div>
                            <hr>
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
                        <a class="float-end" href="contact.php" style="padding-right: 15px; color: black; background-color: transparent; text-decoration: none;"><u>Contact</u></a>
                      </div>
                </div>
            </div>
    </div>
    
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>