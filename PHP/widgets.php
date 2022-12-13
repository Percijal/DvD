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
        return print('<div class="col-2 discInfoBox">
                <img class="movieImage" src="../images/FILMS/'. $data["image"] .'"><br>
                <q class="movieTitle">'. $data["title"] .'</q>
                <p class="moviePriceName">Cena / per. Month: </p><p class="movieOficialPrice">'. $data["price"] .'</p>
                <button id="0_'. $data["id"] .'" onclick="addToCart(this)">DO KOSZYKA</button><br><br>
                <a href="DanePłyta">Wincej informacji</a>
                </div>');
    }
}

class DiscountedWidget implements Widget
{
    public function __construct($data, $discount = 0)
    {
        return print('<div class="col-2 discInfoBox">
                <img class="movieImage" src="../images/FILMS/'. $data["image"] .'"><br>
                <q class="movieTitle">'. $data["title"] .'</q>
                <p class="moviePriceName">Cena / per. Month: </p><s class="moviePrice">'. $data["price"] .'</s><p class="movieOficialPrice">'. round($data["price"] - ($discount/100 * $data["price"]),2) .'</p>
                <button id="'. $discount .'_'. $data["id"] .'" onclick="addToCart(this)">DO KOSZYKA</button><br><br>
                <a href="DanePłyta">Wincej informacji</a>
                </div>');
    }
}

// Użycie - sprawdzenie
// echo "<h2>Testing</h2>";
// StaticFactory::factory('discounted', $rows[0]);
?>
