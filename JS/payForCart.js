function payForCart() {
    i=1
    var myObject = [];
    const currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = currentDate.getMonth();
    var day = currentDate.getDate();
    const currentDateString = `${day}-${month + 1}-${year}`;
    while(document.getElementById(i) != undefined)
    {
        const product =
            {
                "title": document.getElementById("title_"+i).innerText,
                "number": document.getElementById("number_"+i).innerText,
                "price": document.getElementById("price_"+i).innerText,
                "start": currentDateString,
                "end": `${day}-${month + 1 + parseInt(document.getElementById("price_"+i).innerText)}-${year}`
            }
        myObject.push(product);
        i++
    }
    console.log(myObject);
    var data = $.param(myObject);
    $.ajax({
        method: "POST",
        url: "payForCart.php",
        data: data
    })
        .done(function(response) {
            console.log(response)
    });

    // location.reload()
}