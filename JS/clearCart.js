function clearCart() {

    $.ajax({
        method: "POST",
        url: "clearCart.php"
    })
        .done(function(response) {
            console.log(response)
    });

    location.reload()
}