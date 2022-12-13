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
//print_r($rows)
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
                        <a class="navbar-brand col-4" href="../PHP/index.php">Logo strony</a>
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
                    <div class="col d-flex flex-row-reverse">
                        <!-- Start PHP -->

                        <!-- ===> --> <img class="p-2 profilePicture" src="../images/ProfileIcons/profileIcon.png" alt="PprofileImage">

                        <!-- END PHP -->
                    </div>
                    <div class="col UsersInfo">

                    <!-- sPHP -->

                    <!-- *** -->
                    <!-- W linijce nad 'log out' dałem pole wyboru. Użytkownik wybiera sobie jedną ikonę z pośród podanych i 
                    zatwierdza przyciskiem. Po kliknięciu przycisku jakoś prześlesz dane do bazy i odświerzymy stronę aby pokazać
                    użytkownikowi nowe zmiany w <img> powyżej . Wszystko jest w formularzu więc raczej bez większego problemu 
                    podepniesz sobie PHP Rozwiązanie to zapobiegnie używaniu wyskakujących okien. 
                    
                    Trochę na hama i w prost ale raczej zadziała (I guess...) -->

                    <?php
                        // echo '<p><b>User ID:</b> <i>'.$_SESSION["UserId"].'</i></p>';
                        echo '<p><b>Name:</b> <i>'.$_SESSION["Name"].'</i></p>';
                        echo '<p><b>Surname:</b> <i>'.$_SESSION["Surname"].'</i></p>';
                        echo '&nbsp';
                        ?>
                        <br>
                        <form action="#">
                            <?php
                                echo '<p style="color: white;"><b>Current Profile image:</b> <i>'. /* miejsce wyświetlenia nazwy aktualnego zdjęcia */ '</i></p>';
                                echo '<p style="color: white;"><b>Change ProfileImage:</b>'; ?>  
                                <select name="image" id="image">
                                    <option disabled>----------</option>
                                    <option value="1">Image 1</option>
                                    <option value="2">Image 2</option>
                                    <option value="3">Image 3</option>
                                    <option value="4">Image 4</option>
                                    <option value="5">Image 5</option>
                                    <option value="6">Image 6</option>
                                    <option value="7">Image 7</option>
                                    <option value="8">Image 8</option>

                                    <option disabled>----------</option>
                                </select>
                                
                            <?php echo' <input type="submit" value="Try it" class="checkItButon"></p>';
                            ?>
                        </form>
                        <?php
                        echo '<a href="./logOut.php">Log out</a>'
                    ?>
                    <!-- END PHP -->
                    </div>
                </div>
                <hr style="border: 1px solid black;">
                <div class="row">
                    <div class="col profileMovieTitle">
                        <q>Twoje Wypożyczenia</q>

                    </div>
                </div><br>
                <div class="row">
                    <div class="col-4 offset-4 profileMovieInfo">
                        <!-- sPHP -->
                        <?php
                            if(!isset($rows[0])){
                                echo '<q>To co?</q><br>
                                    <q class="lastText">Pora coś kupić :3</q><br>
                                    <p></p>';
                            }
                            else{
                                $i=1;
                                echo'<table class="personalMovies">
                                <tr>
                                    <th class="iDColumn" style="padding: 5px">id.</th>
                                    <th class="imageColumn">image</th>
                                    <th class="titleColumn">tytul</th>
                                    <th class="termColumn">Termin zwrotu</th>
                                </tr>';
                                foreach ($rows as $row) {
                                    echo'
                                        <tr>
                                            <td>'.$i.".</td>
                                            <td><img class='tableMovieImage' src='../images/FILMS/". $row['image'] ."'></td>
                                            <td><q>".$row['title']."</q></td>
                                            <td>".$row['date_end']."</td>
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

            <!-- ====================================================================== -->
        
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