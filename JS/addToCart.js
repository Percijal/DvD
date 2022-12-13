function addToCart(button) {
    id = button.id;
    disc = id.split('_')[0];
    id_article = id.split('_')[1];

    $.ajax({
        method: "POST",
        url: "addToCart.php",
        data: { id: id_article, disc: disc }
    })
        .done(function(response) {
            console.log(response)
    });
}

