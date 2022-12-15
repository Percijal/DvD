<?php
session_start();
require("widgets.php");
require("db_connect.php");

$logged = isset($_SESSION["UserId"]); //boolean
if ($logged)
    $isAdmin = ($_SESSION["isAdmin"] == "true") ? true : false ; //boolean  

$sql = new SqlLiteQueryBuilder();
$query = $pdo -> query($sql ->select('Cart', ['*'])
              -> join('Cart', 'DVDs', 'id_dvd', 'id')
              -> where('id_user', $_SESSION["UserId"])
              -> getSQL() );
$rows = $query -> fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
            <div class="main" style="display: block; padding: 15px;">

                <div class="row">
                    <div class="col cartTitle">
                        Koszyk
                    </div>
                </div>
                <hr style="margin-bottom: 25px">
                <div class="">
                    <!-- Start PHP --> 
                        <div class="row justify-content-center" style="text-align: center;">
                            <div class="col-auto">
                                <table class="table table-responsive">
                                    <tr>
                                        <th class="th">id</th>
                                        <th class="th">Tytul</th>
                                        <th class="th">Cena</th>
                                        <th class="th">Czas trwania wypożyczenia(miesiace)</th>
                                        <th class="th">Koszt</th>
                                        <th class="th">Usun Film</th>
                                    </tr>

                                    <!-- sPHP -->
                                    <?php
                                    $i=1;
                                    foreach ($rows as $row) {
                                        echo '<tr>
                                        <td class="td" id="'.$i.'">'.$i.'.</td>
                                        <td class="td"  id="title_'.$i.'">'.$row['title'].'</td>
                                        <td class="td">'.round($row["price"] - ($row['discount']/100 * $row["price"]),2).'</td>
                                        <td class="td" id="number_'.$i.'">'.$row["number_of"].'</td>
                                        <td class="td price" id="price_'.$i.'">'.$row["number_of"] * round($row["price"] - ($row['discount']/100 * $row["price"]),2).'</td>
                                        <td class="td"><a href="#">Usun Film</a></td>
                                        </tr>';
                                        $i++;
                                    }
                                    ?>
                                    <!-- ePHP -->
                                    <tr>
                                        <!-- Start PHP -->
                                        <td class="clearTd" colspan="3"></td>
                                        <td class="td">Łączna Kwota:</td>
                                        <td id="countCart"></td>
                                        <!-- END PHP -->
                                    </tr>
                                    <tr>
                                        <!-- Start PHP -->
                                        <td class="clearTd" colspan="3"></td>
                                        <td class="td cartClearButton"><button class="cartClearButton" onclick="clearCart()">Usun koszyk</button></td>
                                        <td><button class="cartPayButton">Zaplac</button></td>
                                        <!-- END PHP -->
                                    </tr>
                                </table>
                            </div>

                        </div>
                        <hr>
                    <!-- END PHP -->

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
    </div>
    
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../js/countCart.js"></script>
<script src="../js/clearCart.js"></script>
<script src="../js/payForCart.js"></script>