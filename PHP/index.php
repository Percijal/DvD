<?php
session_start();

$logged = isset($_SESSION["UserId"]); //boolean
$isAdmin = isset($_SESSION["isAdmin"]); //boolean


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
    <style>
        *{
            padding: 0px;
            margin: 0px;
        }
        .container-fluid{
            background-color: gray;
            padding: 0px;
        }

        .footer{
            background-color: bisque;
        }
        .top{
            background-color: bisque;
        }
        .discInfoBox{
            border: 1px solid black;
            border-radius: 10px;
            padding: 5px;
        }
        .test{
            color: bisque;
        }
        .profileIcon{
            padding-left: 10px;
        }
        .cartIcon{
            padding-left: 10px;
            padding-right: 10px;
        }
        a{
            font-style: italic;
            text-decoration: none;
            color: gold;
        }
        a:hover{
            color:orangered
        }
        @media only screen and (min-width: 1170px){
            .navbarButton {
                width: 100px;
            }
        }
        @media only screen and (max-width: 1169px) and (min-width: 970px){
            .navbarButton {
                width: 85px;
            }
        }
        @media only screen and (max-width: 969px) and (min-width: 750px){
            .navbarButton {
                width: 75px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="top" style="background-color: gray">
            <nav class="navbar" style="padding: 0px;">
                <div class="container-fluid" style="padding: 15px; background-color: bisque;">
                    <a class="navbar-brand col-4" href="index.php">Logo strony</a>
                    <div class="col-sm-3 col-md-4 col-lg-5"></div> 
                    <div class="profileIcon">
                        <a class="nav-link col-1" href="
                        <?php
                        if ($logged) {
                        echo "profile.html";
                        }
                        else{
                        echo "login.php";
                        }
                        ?>
                        "><img src="../images/user.png" alt="user.png" width="50px" height="50px"></a>
                    </div>
                    <div class="cartIcon" >
                        <a class="nav-link col-1" href="
                        <?php
                        if ($logged) {
                        echo "cart.html";
                        }
                        else{
                        echo "registration.php";
                        }
                        ?>
                        "><img src="../images/cart.png" alt="cart.png" width="50px" height="50px"></a>
                    </div>
                    <button class="navbar-toggler navbarButton" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 200px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logOut.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Link
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <!-- W poniższym elemencie[a] trzeba ogarnąć klasę disabled w przypadku zalogowanego użytkownika/ NIE admina -->
                    <?php
                        if($isAdmin)
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='index_admin.php'>Admin Settings</a>
                            </li>"
                    ?>

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
            
            <div class="logoBanner" style="display: block; padding: 15px;">
                <p style="border: 1px solid black;margin-top: 10px; padding: 20px;">Miejsce na banner</p>
            </div>
            <!-- ====================================================================== -->
            <div class="main" style="padding: 15px;">
                <div class="row">
                    <div class="col" style="text-align: center;">
                        Index.html (Nazwa Strony)
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
                            Kilka płyt (np. bestseller / nowsze) [informacje]
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align: center;">
                            <div class="discInfo">
                                [ Poniżej Info o płycie będzie (div + info z bazy) * n ]
                            </div>
                        </div>
                        
                    </div><br>
                    <div class="row" style="text-align: center;">
                        
                                <!-- Start PHP -->

                                <div class="col-3 discInfoBox">
                                    <!--    -> Zdjęcie (output z bazy)
                                            -> Nazwa Płyty (output z bazy)
                                            -> Cena (output z bazy)
                                            -> Więcej informacji (link do strony, sesją na szkelecie 
                                            strony wiświetlimy powiększone wszystkie informacje z bazy)
                                            -> Dodaj do koszyka (guzik z odniesieniem do koszyka)
                                    -->
                                    <img src="test">
                                    <p>"Nazwa płyty"</p>
                                    <p>Cena</p>
                                    <button type="submit">dodaj do koszyka</button><br>
                                    <a href="DanePłyta">wincej informacji</a>

                                </div>
                                <div class="col-3 discInfoBox">
                                    <img src="test">
                                    <p>"Nazwa płyty"</p>
                                    <p>Cena</p>
                                    <button type="submit">dodaj do koszyka</button><br>
                                    <a href="DanePłyta">wincej informacji</a>
                                </div>
                                <div class="col-3 discInfoBox">
                                    <img src="test">
                                    <p>"Nazwa płyty"</p>
                                    <p>Cena</p>
                                    <button type="submit">dodaj do koszyka</button><br>
                                    <a href="DanePłyta">wincej informacji</a>
                                </div>
                                <div class="col-3 discInfoBox">
                                    <img src="test">
                                    <p>"Nazwa płyty"</p>
                                    <p>Cena</p>
                                    <button type="submit">dodaj do koszyka</button><br>
                                    <a href="DanePłyta">wincej informacji</a>
                                </div>
                                    
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
                    <a class="float-end" href="contact.html" style="padding-right: 15px; color: black; background-color: transparent; text-decoration: none;"><u>Kontakt</u></a>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>