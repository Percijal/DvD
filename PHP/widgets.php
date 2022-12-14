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
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-2 discInfoBox">
                <img class="movieImage" src="../images/FILMS/'. $data["image"] .'"><br>
                <q class="movieTitle">'. $data["title"] .'</q>
                <p class="moviePriceName">Cena / per. Month: </p><p class="movieOficialPrice">'. $data["price"] .'</p>
                <button id="0_'. $data["id"] .'" onclick="addToCart(this)">DO KOSZYKA</button><br><br>
                <a href="DanePłyta" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Wincej informacji</a>
                </div>');
    }
}

class DiscountedWidget implements Widget
{
    public function __construct($data, $discount = 0)
    {
        return print('<!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-2 discInfoBox">
                <img class="movieImage" src="../images/FILMS/'. $data["image"] .'"><br>
                <q class="movieTitle">'. $data["title"] .'</q>
                <p class="moviePriceName">Cena / per. Month: </p><s class="moviePrice">'. $data["price"] .'</s><p class="movieOficialPrice">'. round($data["price"] - ($discount/100 * $data["price"]),2) .'</p>
                <button id="'. $discount .'_'. $data["id"] .'" onclick="addToCart(this)">DO KOSZYKA</button><br><br>
                <a href="DanePłyta" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Wincej informacji</a>
                </div>');
    }
}

// Użycie - sprawdzenie
// echo "<h2>Testing</h2>";
// StaticFactory::factory('discounted', $rows[0]);
?>
