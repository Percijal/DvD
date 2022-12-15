<?php

//design pattern - Static Factory
final class StaticFactory
{
    public static function factory(string $type, $data, $discount = 0): Widget
    {
        return match ($type) {
            'classic' => new ClassicWidget($data),
            'discounted' => new DiscountedWidget($data, $discount),
            default => throw new InvalidArgumentException('Unknown type given'),
        };
    }
}

interface Widget
{

}

class ClassicWidget implements Widget
{
    public function __construct($data)
    {
        return print('<!-- Modal -->
                <div class="modal fade" id="model_0'.$data["id"] .'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                            <b>Tytuł: <q class="movieTitle">'. $data["title"] .'</q></b>
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
                        </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-2 discInfoBox">
                <img class="movieImage" src="../images/FILMS/'. $data["image"] .'"><br>
                <q class="movieTitle">'. $data["title"] .'</q>
                <p class="moviePriceName">Cena / per. Month: </p><p class="movieOficialPrice">'. $data["price"] .'</p>
                <button id="0_'. $data["id"] .'" onclick="addToCart(this)">DO KOSZYKA</button><br><br>
                <a href="DanePłyta" data-bs-toggle="modal" data-bs-target="#model_0'.$data["id"] .'">Wincej informacji</a>
                </div>');
    }
}

class DiscountedWidget implements Widget
{
    public function __construct($data, $discount = 0)
    {
        return print('<!-- Modal -->
        <div class="modal fade" id="discountedModel_0'.$data["id"] .'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="discountedModelLabel_0'.$data["id"] .'">Informacje</h1>
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
                                    <b>Tytuł: <q class="movieTitle">'. $data["title"] .'</q></b>
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
                                <b>Cena: <span class="movieTitle">'. round($data["price"] - ($discount/100 * $data["price"]),2) ."/per.month" .'</span></b>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
                
                <div class="col-2 discInfoBox">
                <img class="movieImage" src="../images/FILMS/'. $data["image"] .'"><br>
                <q class="movieTitle">'. $data["title"] .'</q>
                <p class="moviePriceName">Cena / per. Month: </p><s class="moviePrice">'. $data["price"] .'</s><p class="movieOficialPrice">'. round($data["price"] - ($discount/100 * $data["price"]),2) .'</p>
                <button id="'. $discount .'_'. $data["id"] .'" onclick="addToCart(this)">DO KOSZYKA</button><br><br>
                <a href="DanePłyta" data-bs-toggle="modal" data-bs-target="#discountedModel_0'.$data["id"] .'" >Wincej informacji</a>
                </div>');
    }
}

// Użycie - sprawdzenie
// echo "<h2>Testing</h2>";
// StaticFactory::factory('discounted', $rows[0]);
?>
