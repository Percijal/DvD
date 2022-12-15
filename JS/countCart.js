const cells = document.getElementsByClassName('price');

sum = 0
for (let index = 0; index < cells.length; index++) {
  sum += parseFloat(cells[index].innerText)
}

document.getElementById("countCart").innerHTML = sum.toFixed(2);