<?php
session_start();
require("widgets.php");
require("db_connect.php");

$logged = isset($_SESSION["UserId"]); //boolean
if ($logged)
    $isAdmin = ($_SESSION["isAdmin"] == "true") ? true : false ; //boolean  

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query($sql ->select("DVDs", ["*"])
              ->getSQL());
$rows = $query -> fetchAll(PDO::FETCH_ASSOC);

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
                            echo "profile.php";
                            }
                            else{
                            echo "login.php";
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
                            echo "cart.php";
                            }
                            else{
                            echo "login.php";
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

                                    <!-- sPHP -->
                                    <?php
                                        if($logged)
                                            echo "<a class='nav-link' href='profile.php'>Profile</a>";
                                        else
                                            echo "<a class='nav-link' href='login.php'>Profile</a>";
                                    ?>
                                    <!-- ePHP -->

                                    
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        More
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                                        <li><a class="dropdown-item" href="contact.php">Contact</a></li>
                                        <li><hr class="dropdown-divider"></li>

                                        <!-- sPHP -->
                                        <?php
                                        if($logged)
                                            echo "
                                                <li><a class='dropdown-item' href='logOut.php'>Log out</a></li>"; //niszczenie sesji i wylogowanie u??ytkownika
                                        else
                                            echo "
                                                <li><a class='dropdown-item' href='login.php'>Log in</a></li>";
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
                            <form class="d-flex" role="search" method="POST">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="main" style="display: block;">
                <div class="logoBanner" style="display: block; padding: 15px;">
                    <!-- <p style="border: 1px solid black;margin-top: 10px; padding: 20px;">Miejsce na banner</p> -->
                    <img id="banner" src="../images/bannerTest.jpg" alt="baner">
                </div>
                <!-- ====================================================================== -->
                <div class="main" style="padding: 15px;">
                    <!-- <div class="row">
                        <div class="col" style="text-align: center;">
                            Index.php (Nazwa Strony)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align: center;">
                            Informacje o stronie
                        </div>
                    </div><br>
                    <div class="discs">
                        <div class="row">
                            <div class="col" style="text-align: center;">
                                Kilka p??yt (np. bestseller / nowsze) [informacje]
                            </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align: center;">
                            <div class="discInfo">
                                [ Poni??ej Info o p??ycie b??dzie (div + info z bazy) * n ]
                            </div>
                        </div>
                    </div> -->
                    
                    <hr>
                    <br>

                    <div class="row justify-content-center">
                        <div class="col-4 justify-content-center" style="text-align: center;">
                            <img src="../images/image1.png" alt="image1">
                        </div>
                        <div class="col-4 justify-content-center" style="text-align: center;">
                            <img src="../images/image2.png" alt="image2">
                        </div>
                        <div class="col-4 justify-content-center" style="text-align: center;">
                            <img src="../images/image3.png" alt="image3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="col" style="text-align: center;">
                                <b><i><h2>Watch anywhere</h2></i></b>
                            </div>
                            <div class="col" style="text-align: center;">
                                <h5>Enjoy from the web or with the "HH Junior" app on 
                                    your phone, tablet, or select Smart TVs ??? on up to 3 devices at once.</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col" style="text-align: center;">
                                <b><i><h2>Download and go</h2></i></b>
                            </div>
                            <div class="col" style="text-align: center;">
                                <h5>Watch offline on the "HH Junior" app when you download 
                                    titles to your iPhone, iPad, Tablet, or Android device.</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col" style="text-align: center;">
                                <b><i><h2>Data saver</h2></i></b>
                            </div>
                            <div class="col" style="text-align: center;">
                                <h5>Control data usage while downloading and watching videos on select phones or tablets.</h5>
                            </div>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <div class="row justify-content-around">
                        <div class="col-4 arrowButtonLeft">
                            <button class="">
                                <img src="../images/PageIcons/ArrowLeft.png" alt="ArrowLeft.png" width="50px" height="50px">
                            </button>
                        </div>
                        <div class="col-3 normalMovieInfo">
                            Latest movies:
                        </div>
                        <div class="col-4 arrowButtonRight">
                            <button class="">
                                <img src="../images/PageIcons/ArrowRight.png" alt="ArrowRight.png" width="50px" height="50px">
                            </buton>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-around" style="text-align: center;">
                        
                        <!-- sPHP -->
                        <?php
                            for ($i=5; $i < 10; $i++) { 
                                StaticFactory::factory('new', $rows[$i], 20);
                            }
                        ?>
                        <!-- ePHP -->

                    </div>
                    <br>
                    <hr>
                    <div class="row justify-content-around">
                        <div class="col-4 arrowButtonLeft">
                            <button class="">
                                <img src="../images/PageIcons/ArrowLeft.png" alt="ArrowLeft.png" width="50px" height="50px">
                            </button>
                        </div>
                        <div class="col-3 normalMovieInfo">
                            Discounted movies:
                        </div>
                        <div class="col-4 arrowButtonRight">
                            <button class="">
                                <img src="../images/PageIcons/ArrowRight.png" alt="ArrowRight.png" width="50px" height="50px">
                            </buton>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-around" style="text-align: center;">
                        
                        <!-- sPHP -->
                        <?php
                            for ($i=1; $i < 5; $i++) { 
                                StaticFactory::factory('discounted', $rows[$i], 20);
                            }
                        ?>
                        <!-- ePHP -->

                    </div>
                    <br>
                    <hr>
                    <div class="row justify-content-around">
                        <div class="col-4 arrowButtonLeft">
                            <button class="">
                                <img src="../images/PageIcons/ArrowLeft.png" alt="ArrowLeft.png" width="50px" height="50px">
                            </button>
                        </div>
                        <div class="col-3 normalMovieInfo">
                            Cult movies:
                        </div>
                        <div class="col-4 arrowButtonRight">
                            <button class="">
                                <img src="../images/PageIcons/ArrowRight.png" alt="ArrowRight.png" width="50px" height="50px">
                            </buton>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-around" style="text-align: center;">
                        
                        <!-- sPHP -->
                        <?php
                            for ($i=10; $i < 15; $i++) { 
                                StaticFactory::factory('classic', $rows[$i]);
                            }
                        ?>
                        <!-- ePHP -->

                    </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col" style="text-align: center;">
                            <q style="color:white;">If you're not a good shot today, don't worry. There are other ways to be useful.</q>
                        </div>
                    </div>
                    <br>
                </div>
                <!-- ====================================================================== -->
            </div>
            <div class="footer sticky-bottom bg-gray opacity-100 w-100"  style="background-color: bisque;">
                <div class="row">
                    <p class="col-3" style="padding-left: 25px;">Copyright ????? 2022</p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../js/addToCart.js"></script>
<!-- <script src="../js/baner.js"></script> -->

<!-- Pseudo search nwm czy zostawi??, jak co?? to usu?? -->
<?php

if(isset($_POST["Search"])){
    $search = $_POST["Search"];
    if($search != ""){
        foreach($rows as $data){
            if(strtolower($data["title"])==strtolower($search)){
                unset($_POST["Search"]);
                echo '<!-- Modal -->
                <div class="modal fade" id="search" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modelLabel_0'.$data["id"] .'">Informacje</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row ">
                                <div class="col-6" lign-items-center items-center justify-content-center">
                                    <img class="movieImage" src="../images/FILMS/'. $data["image"] .'">
                                </div>
                                <div class="d-flex col-6 align-items-center items-center justify-content-center">
                                    <div class="col">
                                        <div class="col">
                                            <b>Tytu??: <q class="movieTitle">'. $data["title"] .'</q></b>
                                        </div>
                                        <div class="col">
                                            <b>Gatunek: <span class="movieTitle">'. $data["genre"] .'</span></b>
                                        </div>
                                        <div class="col">
                                            <b>Autor: <span class="movieTitle">'.  $data["author"] .'</span></b>
                                        </div>
                                        <div class="col">
                                            <b>Rok produkcji: <span class="movieTitle">'.  $data["year"] .'</span></b>
                                        </div>
                                        <div class="col">
                                            <b>Opis: <br> <span class="movieTitle">'.  $data["descrip"] .'</span></b>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <b>Cena: <span class="movieTitle">'. $data["price"]."/per.month" .'</span></b>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-warning" data-bs-dismiss="modal" id="0_'. $data["id"] .'" onclick="addToCart(this)">Add to Cart</button><br><br>
                        </div>
                        </div>
                    </div>
                </div>
                <script>
                const myModalAlternative = new bootstrap.Modal("#search")
                myModalAlternative.show();
                </script>';
                break;
            };
        };
        
    };
}
?>
