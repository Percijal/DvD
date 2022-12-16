function pay() {
    $.ajax({
        type: "POST",
        url: "pay.php"
    })
       .done(function (data) {
            console.log(data);
    });

    location.reload()
}