var container = document.createElement('div');
container.style.width = '100vw';
container.style.height = '100px';
container.style.overflow = 'hidden';
document.getElementsByClassName("logoBanner")[0].appendChild(container);

// Create a block of elements and add them to the container
for (var i = 0; i < 10; i++) {
  var element = document.createElement('div');
  element.style.width = '100px';
  element.style.height = '100px';
  element.style.float = 'left';
  element.innerHTML = 'Element ' + i;
  container.appendChild(element);
}

// Set the initial position of the block of elements
container.style.position = 'relative';
container.style.left = '0px';

// Create a function that updates the position of the block of elements
function updateElements() {
  // Increment the position of the block of elements
  var left = parseInt(container.style.left);
  container.style.left = (left - 100) + 'px';

  // If the block of elements has reached the end of the container, reset its position
  if (left < -(container.childNodes.length * 100)) {
    container.style.left = '0px';
  }
}

// Create a button that calls updateElements when clicked
var button = document.createElement('button');
button.innerHTML = 'Scroll';
button.addEventListener('click', updateElements);
document.getElementsByClassName("logoBanner")[0].appendChild(button);