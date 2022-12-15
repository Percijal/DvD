<?php
session_start();
require("widgets.php");
require("db_connect.php");

$logged = isset($_SESSION["UserId"]); //boolean
if ($logged)
    $isAdmin = ($_SESSION["isAdmin"] == "true") ? true : false ; //boolean  

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query($sql ->select('Orders', ['*'])
              -> join('Orders', 'DVDs', 'id_dvd', 'id')
              -> where('id_user', $_SESSION["UserId"])
              -> getSQL() );
$rows = $query -> fetchAll(PDO::FETCH_ASSOC);

$sql = new SqlLiteQueryBuilder();
$query1 = $pdo -> query($sql ->select("Users", ["prof_image"])
                            ->where("id", $_SESSION["UserId"])
                            ->getSQL());
$rows1 = $query1 -> fetchAll(PDO::FETCH_ASSOC);
//print_r($rows)
// print_r($rows1)
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
                            echo "registration.php";
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
                                                <li><a class='dropdown-item' href='logOut.php'>Log out</a></li>"; //niszczenie sesji i wylogowanie użytkownika
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
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="main" style="display: block;">

                <div class="row FromUPaBit">
                    <div class="col-6" align="right">
                        <?php
                        if($logged){
                            if($rows1[0]["prof_image"] != "")
                                echo '<img id="mainPhoto" class="p-2 profilePicture" src="../images/ProfileIcons/'.$rows1[0]["prof_image"].'" alt="ProfileImage">';
                            else
                                echo '<img id="mainPhoto" class="p-2 profilePicture" src="../images/ProfileIcons/ProfileIcon.png" alt="ProfileImage">';
                        }
                        ?>
                    </div>
                    <div class="col UsersInfo">

                    <!-- sPHP -->
                    <?php
                        // echo '<p><b>User ID:</b> <i>'.$_SESSION["UserId"].'</i></p>';
                        echo '<p><b>Name:</b> <i>'.$_SESSION["Name"].'</i></p>';
                        echo '<p><b>Surname:</b> <i>'.$_SESSION["Surname"].'</i></p>';
                        echo '&nbsp';
                        ?>
                        <br>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Profile images</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-3" align="center">
                                                <input class="form-check-input" type="radio" name="radioPicture" id="radioPicture1" value="" aria-label="...">
                                                <label for="radioPicture1">
                                                    <img id="ID1" class="selectProfilePicture" src="../images/ProfileIcons/profileIcon.png" alt="image1"   >
                                                </label>
                                            </div>

                                            <div class="col-3" align="center">
                                                <input class="form-check-input" type="radio" name="radioPicture" id="radioPicture2" value="" aria-label="...">
                                                <label for="radioPicture2">
                                                    <img id="ID2" class="selectProfilePicture" src="../images/ProfileIcons/profileIcon2.png" alt="image2"   >
                                                </label>
                                            </div>

                                            <div class="col-3" align="center">
                                                <input class="form-check-input" type="radio" name="radioPicture" id="radioPicture3" value="" aria-label="...">
                                                <label for="radioPicture3">
                                                    <img id="ID3" class="selectProfilePicture" src="../images/ProfileIcons/profileIcon3.png" alt="image3"   >
                                                </label>
                                            </div>

                                            <div class="col-3" align="center">
                                                <input class="form-check-input" type="radio" name="radioPicture" id="radioPicture4" value="" aria-label="...">
                                                <label for="radioPicture4">
                                                    <img id="ID4" class="selectProfilePicture" src="../images/ProfileIcons/profileIcon4.png" alt="image4"   >
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3" align="center">
                                                <input class="form-check-input" type="radio" name="radioPicture" id="radioPicture5" value="" aria-label="...">
                                                <label for="radioPicture5">
                                                    <img id="ID5" class="selectProfilePicture" src="../images/ProfileIcons/profileIcon5.png" alt="image5"   >
                                                </label>
                                            </div>
                                            <div class="col-3" align="center">
                                                <input class="form-check-input" type="radio" name="radioPicture" id="radioPicture6" value="" aria-label="...">
                                                <label for="radioPicture6">
                                                    <img id="ID6" class="selectProfilePicture" src="../images/ProfileIcons/profileIcon6.png" alt="image6"   >
                                                </label>
                                            </div>
                                            <div class="col-3" align="center">
                                                <input class="form-check-input" type="radio" name="radioPicture" id="radioPicture7" value="" aria-label="...">
                                                <label for="radioPicture7">
                                                    <img id="ID7" class="selectProfilePicture" src="../images/ProfileIcons/profileIcon7.png" alt="image7"   >
                                                </label>
                                            </div>
                                            <div class="col-3" align="center">
                                                <input class="form-check-input" type="radio" name="radioPicture" id="radioPicture8" value="" aria-label="...">
                                                <label for="radioPicture8">
                                                    <img id="ID8" class="selectProfilePicture" src="../images/ProfileIcons/profileIcon8.png" alt="image8"   >
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-warning" data-bs-dismiss="modal" onclick="whichImage()">Try it</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="movieModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="movieModalLabel">Player Online</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Player is currently unavailable...
                                        <br>
                                        <br>
                                        We are very sorry about this.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p style="color: white;"><b>Change Profile Image:</b>
                        <button class="checkItButon" onclick="pokaz()">Change it</button></p>
                        <?php
                        echo '<a href="./logOut.php">Log out</a>'
                    ?>
                    <!-- END PHP -->
                    </div>
                </div>
                <hr style="border: 1px solid black;">
                <div class="row">
                    <div class="col profileMovieTitle">
                        <q>Your Rentals</q>

                    </div>
                </div><br>
                <div class="row">
                    <div class="col-4 offset-4 profileMovieInfo">
                        <!-- sPHP -->
                        <?php
                            if(!isset($rows[0])){
                                echo "<q>Now what?</q><br>
                                    <q class='lastText'>It's time to rent something :3</q><br>
                                    <p></p>";
                            }
                            else{
                                $i=1;
                                echo'<table class="personalMovies">
                                <tr>
                                    <th class="iDColumn" style="padding: 5px">id.</th>
                                    <th class="imageColumn">image</th>
                                    <th class="titleColumn">Title</th>
                                    <th class="termColumn">Renting Duration</th>
                                    <th class="termColumn">Player online</th>
                                </tr>';
                                foreach ($rows as $row) {
                                    echo'
                                        <tr>
                                            <td>'.$i.".</td>
                                            <td><img class='tableMovieImage' src='../images/FILMS/". $row['image'] ."'></td>
                                            <td><q>".$row['title']."</q></td>
                                            <td>".$row['date_end']."</td>
                                            <td><button class='checkItButon' onclick='pokazPlayer()'>Watch now</button></td>
                                        </tr>
                                    ";
                                    $i++;
                                }
                                echo '</table><p></p>';

                            }

                        ?>
                        <!-- ePHP -->
                    </div>
                    <hr style="border: 1px solid black; margin-top: 10px;">      
                    
                </div>
                    
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


<script src="../JS/profilePage.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    const myModalAlternative = new bootstrap.Modal('#staticBackdrop')
    const myModalAMoviePlayer = new bootstrap.Modal('#movieModal')
    function pokaz(){
        myModalAlternative.show();
    }
    function pokazPlayer(){
        myModalAMoviePlayer.show();
    }
</script>
