const cells = document.querySelectorAll('td.price');

const sum = Array.prototype.reduce.call(cells, (acc, cell) => {
  return acc + Number(cell.textContent);
}, 0);


document.getElementById("countCart").innerText = sum.toString();