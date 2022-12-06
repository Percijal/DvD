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
        return print('<div class="col-3 discInfoBox">
                <img src="../images/FILMS/'. $data["image"] .'">
                <p>'. $data["title"] .'</p>
                <p>Cena</p><p>'. $data["price"] .'</p>
                <button type="submit">DO KOSZYKA</button><br>
                <a href="DanePłyta">Wincej informacji</a>
                </div>');
    }
}

class DiscountedWidget implements Widget
{
    public function __construct($data, $discount = 0)
    {
        return print('<div class="col-3 discInfoBox">
                <img src="../images/FILMS/'. $data["image"] .'">
                <p>'. $data["title"] .'</p>
                <p>Cena</p><s>'. $data["price"] .'</s><p>'. round($data["price"] - ($discount/100 * $data["price"]),2) .'</p>
                <button type="submit">DO KOSZYKA</button><br>
                <a href="DanePłyta">Wincej informacji</a>
                </div>');
    }
}

// Użycie - sprawdzenie
// echo "<h2>Testing</h2>";
// StaticFactory::factory('discounted', $rows[0]);
?>